<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Model\Session;

class CookieService
{
    public static $COOKIE_NAME = "X-SESSION";
    public static $COOKIE_USERNAME = "X-SESSION-USERNAME";




    public function setCookie(Session $session)
    {
        setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24), '/');
        setcookie(self::$COOKIE_USERNAME, $session->userId, time() + (60 * 60 * 24), '/');
    }
    public function getCookie(string $cookieName)
    {
        return $_COOKIE[$cookieName] ?? '';
    }
}