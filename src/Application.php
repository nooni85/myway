<?php

namespace EdenProject\MyWay;

use EdenProject\MyWay\Model\User;
use EdenProject\MyWay\Storage\KeyValueStorage;

class Application
{
    /*
     * 세션 데이터를 저장할 변수이다.
     */
    protected KeyValueStorage $sessionStorage;
    protected KeyValueStorage $cookieStorage;

    public function login(User $user)
    {
    }

    public function logout()
    {

    }
}
