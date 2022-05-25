<?php

namespace Tolehoai\CarForRent\Service;

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
    private $randomService;



    public function __construct(
        SessionRepository $sessionRepository,
        UserRepository $userRepository,
        CookieService $cookieService,
        RandomService $randomService
    ) {
        $this->sessionRepository = $sessionRepository;
        $this->userRepository = $userRepository;
        $this->cookieService = $cookieService;
        $this->randomService = $randomService;
    }

    public function create($userId)
    {
        $session = new Session();
        $session->id = $this->randomService->getUniqueId();
        $session->userId = $userId;
        $this->sessionRepository->save($session);
        $this->cookieService->setCookie($session);
        return $session;
    }



    public function destroy() :bool
    {
        $sessionId = $this->cookieService->getCookie(self::$COOKIE_NAME);

        if(!$this->sessionRepository->deleteById($sessionId)) {
            return false;
        }

        $session = new Session();
        $session->setId('');
        $session->setUserId('');
        $this->cookieService->setCookie($session);
        return true;
    }

    public function current()
    {
        $sessionId = $this->cookieService->getCookie(self::$COOKIE_NAME);
        $session = $this->sessionRepository->findById($sessionId);
        if ($session == null) {
            return null;
        }
        return $this->userRepository->findById($session->userId);
    }

}