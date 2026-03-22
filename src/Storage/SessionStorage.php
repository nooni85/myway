<?php

namespace EdenProject\MyWay\Storage;

class SessionStorage implements KeyValueStorage
{
    public function __construct()
    {
        // 세션이 활성화되어 있지 않은 경우에만 세션 시작
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function get(string $key): ?string
    {
        return $_SESSION[$key] ?? null;
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function delete(string $key): void
    {
        if (!$this->hasKey($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function hasKey(string $key): bool
    {
        return isset($_SESSION[$key]);
    }
}
