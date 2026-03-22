<?php

namespace EdenProject\MyWay;

use EdenProject\MyWay\Exception\NullException;
use EdenProject\MyWay\Model\User;
use EdenProject\MyWay\Storage\KeyValueStorage;

class Application
{
    /*
     * 세션 데이터를 저장할 변수이다.
     */
    public ?KeyValueStorage $SessionStorage = null;
    public ?KeyValueStorage $CookieStorage = null;

    public function login(User $user): void
    {
        if ($this->SessionStorage == null) {
            throw new NullException("Session Storage is null");
        }
    }

    public function logout(): void
    {

    }


}
