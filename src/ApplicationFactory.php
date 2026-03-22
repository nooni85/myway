<?php

namespace EdenProject\MyWay;

class ApplicationFactory {
    public static function create(): Application
    {
        $app = new Application();

        // Session

        // Cookie

        return $app;
    }
}