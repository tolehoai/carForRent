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

    public function __construct(SessionRepository $sessionRepository, UserRepository $userRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->userRepository = $userRepository;
    }

    public function create($userId)
    {

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $userId;
        $this->sessionRepository->save($session);
        setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24), '/');
        setcookie(self::$COOKIE_USERNAME, $session->userId, time() + (60 * 60 * 24), '/');
        return $session;
    }


    public function destroy()
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        var_dump($_COOKIE[self::$COOKIE_NAME]);

        $this->sessionRepository->deleteById($sessionId);
        setcookie(self::$COOKIE_NAME,'',1,'/');
        setcookie(self::$COOKIE_USERNAME,'',1,'/');
    }

    public function current()
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $session = $this->sessionRepository->findById($sessionId);
        if($session == null){
            return null;
        }
        return $this->userRepository->findById($session->userId);
    }

}