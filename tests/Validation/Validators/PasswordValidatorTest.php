<?php

namespace EdenProject\MyWay\Tests\Validation\Validators;

use EdenProject\MyWay\Validation\Validators\PasswordValidator;
use EdenProject\MyWay\Exception\InvalidPasswordException;
use PHPUnit\Framework\TestCase;

/**
 * PasswordValidator 테스트 클래스
 */
class PasswordValidatorTest extends TestCase
{
    private PasswordValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new PasswordValidator();
    }

    /**
     * 올바른 비밀번호 형식이 성공하는지 테스트
     */
    public function testValidPasswordSuccess(): void
    {
        $passwords = [
            "Password123",
            "SafePass789",
            "Complex_P123",
            "VeryLongPass!@#1"
        ];

        foreach ($passwords as $pwd) {
            $result = $this->validator->isValid($pwd);
            $this->assertTrue($result, "[$pwd]은(는) 유효한 비밀번호여야 합니다.");
        }
    }

    /**
     * 길이가 짧은 비밀번호가 InvalidPasswordException을 던지는지 테스트
     */
    public function testShortPasswordThrowsException(): void
    {
        $this->expectException(InvalidPasswordException::class);
        $this->expectExceptionMessage("최소 8자 이상이어야 합니다.");
        $this->validator->isValid("Pass1");
    }

    /**
     * 대문자가 없는 비밀번호가 InvalidPasswordException을 던지는지 테스트
     */
    public function testNoUppercaseThrowsException(): void
    {
        $this->expectException(InvalidPasswordException::class);
        $this->expectExceptionMessage("최소 하나의 대문자가 포함되어야 합니다.");
        $this->validator->isValid("password123");
    }

    /**
     * 소문자가 없는 비밀번호가 InvalidPasswordException을 던지는지 테스트
     */
    public function testNoLowercaseThrowsException(): void
    {
        $this->expectException(InvalidPasswordException::class);
        $this->expectExceptionMessage("최소 하나의 소문자가 포함되어야 합니다.");
        $this->validator->isValid("PASSWORD123");
    }

    /**
     * 숫자가 없는 비밀번호가 InvalidPasswordException을 던지는지 테스트
     */
    public function testNoNumberThrowsException(): void
    {
        $this->expectException(InvalidPasswordException::class);
        $this->expectExceptionMessage("최소 하나의 숫자가 포함되어야 합니다.");
        $this->validator->isValid("PasswordOnly");
    }
}
