<?php

namespace EdenProject\MyWay\Storage;

/**
 * HTTP 쿠키를 활용하여 데이터를 저장하고 관리하는 클래스입니다.
 * KeyValueStorage 인터페이스를 구현합니다.
 */
class CookieStorage implements KeyValueStorage
{
    private int $expiry;    // 쿠키 만료 시간 (초)
    private string $path;   // 쿠키 유효 경로
    private string $domain; // 쿠키 유효 도메인
    private bool $secure;   // HTTPS 환경에서만 전송 여부
    private bool $httponly; // 자바스크립트 접근 방지 여부

    /**
     * CookieStorage 생성자. 쿠키 설정 옵션을 초기화합니다.
     * 
     * @param int $expiry 만료 시간 (기본값: 30일)
     * @param string $path 경로 (기본값: "/")
     * @param string $domain 도메인
     * @param bool $secure 보안 설정 여부
     * @param bool $httponly HTTP 전용 설정 여부
     */
    public function __construct(
        int $expiry = 3600 * 24 * 30, // 30일
        string $path = "/",
        string $domain = "",
        bool $secure = false,
        bool $httponly = true
    ) {
        $this->expiry = $expiry;
        $this->path = $path;
        $this->domain = $domain;
        $this->secure = $secure;
        $this->httponly = $httponly;
    }

    /**
     * 특정 키에 해당하는 쿠키 값을 가져옵니다.
     * 
     * @param string $key 쿠키 이름
     * @return string|null 쿠키 값 또는 없으면 null
     */
    public function get(string $key): ?string
    {
        return $_COOKIE[$key] ?? null;
    }

    /**
     * 특정 키에 값을 쿠키로 설정합니다.
     * 
     * @param string $key 쿠키 이름
     * @param mixed $value 저장할 값
     */
    public function set(string $key, $value): void
    {
        setcookie(
            $key,
            (string)$value,
            [
                'expires' => time() + $this->expiry,
                'path' => $this->path,
                'domain' => $this->domain,
                'secure' => $this->secure,
                'httponly' => $this->httponly,
                'samesite' => 'Lax'
            ]
        );
        // 즉시 반영을 위해 전역 변수에도 설정
        $_COOKIE[$key] = (string)$value;
    }

    /**
     * 특정 키의 쿠키를 삭제합니다.
     * 
     * @param string $key 삭제할 쿠키 이름
     */
    public function delete(string $key): void
    {
        setcookie(
            $key,
            "",
            [
                'expires' => time() - 3600, // 과거 시간으로 설정하여 삭제
                'path' => $this->path,
                'domain' => $this->domain,
                'secure' => $this->secure,
                'httponly' => $this->httponly,
                'samesite' => 'Lax'
            ]
        );
        unset($_COOKIE[$key]);
    }

    /**
     * 해당 키의 쿠키가 존재하는지 확인합니다.
     * 
     * @param string $key 확인할 쿠키 이름
     * @return bool 존재 여부
     */
    public function hasKey(string $key): bool
    {
        return isset($_COOKIE[$key]);
    }
}