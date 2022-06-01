<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Model\Session;

class CookieService
{
    public static $COOKIE_NAME = "X-SESSION";
    public static $COOKIE_USERNAME = "X-SESSION-USERNAME";




    public function setCookie(Session $session)
    {
        setcookie(self::$COOKIE_NAME, $session->getId(), time() + (60 * 60 * 24), '/');
        setcookie(self::$COOKIE_USERNAME, $session->getUserId(), time() + (60 * 60 * 24), '/');
    }
    public function getCookie(string $cookieName)
    {
        return $_COOKIE[$cookieName] ?? '';
    }
}
