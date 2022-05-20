<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;

class SessionService
{
    public static $COOKIE_NAME = "X-SESSION";
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
        setcookie(self::$COOKIE_NAME,$session->id,time()+(60*60*24),'/');
        echo "Create Session " . $userId;
        return $session;
    }
}