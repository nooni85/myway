<?php

namespace EdenProject\MyWay;

use EdenProject\MyWay\Storage\CookieStorage;
use EdenProject\MyWay\Storage\SessionStorage;

/**
 * Application 객체를 생성하고 초기화하는 팩토리 클래스입니다.
 */
class ApplicationFactory {
    /**
     * Application 인스턴스를 생성하고 필요한 저장소(세션, 쿠키)를 설정합니다.
     * 
     * @return Application 초기화된 애플리케이션 객체
     */
    public static function create(): Application
    {
        $app = new Application();

        // 세션 저장소 초기화 및 주입
        $app->SessionStorage = new SessionStorage();

        // 쿠키 저장소 초기화 및 주입
        $app->CookieStorage = new CookieStorage();

        return $app;
    }
}