<?php

namespace EdenProject\MyWay\Tests\Validation\Validators;

use EdenProject\MyWay\Validation\Validators\PhoneNumberValidator;
use EdenProject\MyWay\Exception\InvalidPhoneNumberException;
use PHPUnit\Framework\TestCase;

/**
 * PhoneNumberValidator 테스트 클래스
 */
class PhoneNumberValidatorTest extends TestCase
{
    private PhoneNumberValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new PhoneNumberValidator();
    }

    /**
     * 올바른 전화번호 형식(+국가번호번호)이 성공하는지 테스트
     */
    public function testValidPhoneNumberSuccess(): void
    {
        $phoneNumbers = [
            "+8201039451365",
            "+12025550174",
            "+442079460958",
            "+821012345678"
        ];

        foreach ($phoneNumbers as $phone) {
            $result = $this->validator->isValid($phone);
            $this->assertTrue($result, "[$phone]은(는) 유효한 전화번호여야 합니다.");
        }
    }

    /**
     * 잘못된 전화번호 형식이 InvalidPhoneNumberException을 던지는지 테스트
     */
    public function testInvalidPhoneNumberThrowsException(): void
    {
        $invalidNumbers = [
            "01039451365",      // '+' 없음
            "+82-10-1234-5678", // 하이픈 포함
            "+82 10 1234 5678", // 공백 포함
            "+ABCDEFGHIJKL",    // 문자 포함
            "+8210",            // 너무 짧음
            "+1234567890123456" // 너무 김 (15자리 초과)
        ];

        foreach ($invalidNumbers as $phone) {
            try {
                $this->validator->isValid($phone);
                $this->fail("[$phone]은(는) InvalidPhoneNumberException을 던져야 합니다.");
            } catch (InvalidPhoneNumberException $e) {
                $this->assertStringContainsString("유효하지 않은 전화번호 형식입니다.", $e->getMessage());
            }
        }
    }
}
