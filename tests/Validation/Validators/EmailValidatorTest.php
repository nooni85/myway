<?php

namespace EdenProject\MyWay\Tests\Validation\Validators;

use EdenProject\MyWay\Validation\Validators\EmailValidator;
use EdenProject\MyWay\Exception\InvalidEmailException;
use PHPUnit\Framework\TestCase;

/**
 * EmailValidator 테스트 클래스
 */
class EmailValidatorTest extends TestCase
{
    private EmailValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new EmailValidator();
    }

    /**
     * 올바른 이메일 형식이 성공하는지 테스트
     */
    public function testValidEmailValidationSuccess(): void
    {
        $emails = [
            "test@example.com",
            "user.name+tag@gmail.com",
            "info@sub.domain.co.kr",
            "123456@example.org"
        ];

        foreach ($emails as $email) {
            $result = $this->validator->isValid($email);
            $this->assertTrue($result, "[$email]은(는) 유효한 이메일이어야 합니다.");
        }
    }

    /**
     * 잘못된 이메일 형식이 InvalidEmailException을 던지는지 테스트
     */
    public function testInvalidEmailThrowsException(): void
    {
        $invalidEmails = [
            "plainaddress",
            "#@%^%#$@#$@#.com",
            "@example.com",
            "Joe Smith <email@example.com>",
            "email.example.com",
            "email@example@example.com",
            ".email@example.com",
            "email.@example.com",
            "email..email@example.com",
            "あいうえお@example.com",
            "email@example.com (Joe Smith)",
            "email@example",
            "email@-example.com",
            "email@example..com",
            "Abc..123@example.com"
        ];

        foreach ($invalidEmails as $email) {
            try {
                $this->validator->isValid($email);
                $this->fail("[$email]은(는) InvalidEmailException을 던져야 합니다.");
            } catch (InvalidEmailException $e) {
                $this->assertStringContainsString("유효하지 않은 이메일 형식입니다.", $e->getMessage());
            }
        }
    }
}
