<?php

namespace EdenProject\MyWay;

use EdenProject\MyWay\Exception\NullException;
use EdenProject\MyWay\Model\User;
use EdenProject\MyWay\Storage\KeyValueStorage;

/**
 * 애플리케이션의 핵심 로직(사용자 인증, 상태 관리 등)을 처리하는 클래스입니다.
 */
class Application
{
    /**
     * @var KeyValueStorage|null 세션 데이터를 관리하는 저장소
     */
    public ?KeyValueStorage $SessionStorage = null;

    /**
     * @var KeyValueStorage|null 쿠키 데이터를 관리하는 저장소
     */
    public ?KeyValueStorage $CookieStorage = null;

    /**
     * @var User|null 현재 로그인된 사용자 정보
     */
    private ?User $currentUser = null;

    /**
     * 사용자를 로그인 처리합니다.
     * 세션에 사용자 ID를 저장하고 현재 사용자 정보를 메모리에 보관합니다.
     * 
     * @param User $user 로그인할 사용자 객체
     * @throws NullException 세션 저장소가 초기화되지 않은 경우 발생
     */
    public function login(User $user): void
    {
        if ($this->SessionStorage == null) {
            throw new NullException("세션 저장소가 초기화되지 않았습니다.");
        }

        // 세션에 사용자 고유 번호 저장
        $this->SessionStorage->set('user_id', $user->getId());
        $this->currentUser = $user;
    }

    /**
     * 로그아웃 처리를 수행합니다.
     * 세션에서 사용자 정보를 삭제하고 현재 사용자 변수를 초기화합니다.
     * 
     * @throws NullException 세션 저장소가 초기화되지 않은 경우 발생
     */
    public function logout(): void
    {
        if ($this->SessionStorage == null) {
            throw new NullException("세션 저장소가 초기화되지 않았습니다.");
        }

        // 세션에서 사용자 정보 제거
        $this->SessionStorage->delete('user_id');
        $this->currentUser = null;
    }

    /**
     * 현재 사용자가 로그인 상태인지 확인합니다.
     * 
     * @return bool 로그인 여부 (true: 로그인됨, false: 로그인 안 됨)
     * @throws NullException 세션 저장소가 초기화되지 않은 경우 발생
     */
    public function isLoggedIn(): bool
    {
        if ($this->SessionStorage == null) {
            throw new NullException("세션 저장소가 초기화되지 않았습니다.");
        }

        return $this->SessionStorage->hasKey('user_id');
    }

    /**
     * 현재 로그인된 사용자 객체를 반환합니다.
     * 
     * @return User|null 로그인된 사용자 객체 또는 null
     */
    public function getCurrentUser(): ?User
    {
        return $this->currentUser;
    }

    /**
     * 현재 로그인된 사용자 정보를 강제로 설정합니다. (인증 과정에서 사용)
     * 
     * @param User $user 설정할 사용자 객체
     */
    public function setCurrentUser(User $user): void
    {
        $this->currentUser = $user;
    }
}