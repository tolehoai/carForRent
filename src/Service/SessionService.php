<?php

namespace Tolehoai\CarForRent\Service;

use PDOException;
use Tolehoai\CarForRent\Traits\RandomGenerateTrait;
use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;

class SessionService
{
    public static $COOKIE_NAME = "X-SESSION";
    public static $COOKIE_USERNAME = "X-SESSION-USERNAME";

    private $sessionRepository;
    private $userRepository;
    private $cookieService;
    use RandomGenerateTrait;

    public function __construct(
        SessionRepository $sessionRepository,
        UserRepository $userRepository,
        CookieService $cookieService
    ) {
        $this->sessionRepository = $sessionRepository;
        $this->userRepository = $userRepository;
        $this->cookieService = $cookieService;
    }

    public function create($userId)
    {
        try {
            $session = new Session();
            $session->setId($this->generateUUID());
            $session->setUserId($userId);
            $result = $this->sessionRepository->save($session);
            $this->cookieService->setCookie($session);
            return $result;
        }catch (PDOException $e){
            return [];
        }
    }


    public function destroy(): bool
    {
        $sessionId = $this->cookieService->getCookie(self::$COOKIE_NAME);

        if (!$this->sessionRepository->deleteById($sessionId)) {
            return false;
        }

        $session = new Session();
        $session->setId('');
        $session->setUserId('');
        $this->cookieService->setCookie($session);
        return true;
    }


}
