<?php

namespace EdenProject\MyWay\Exception;

/**
 * 유효하지 않은 전화번호 형식일 때 발생하는 예외
 */
class InvalidPhoneNumberException extends \InvalidArgumentException
{
    public function __construct(string $phoneNumber = "")
    {
        $message = "유효하지 않은 전화번호 형식입니다.";

        if (!empty($phoneNumber)) {
            $message = "[$phoneNumber]은(는) 유효하지 않은 전화번호 형식입니다. '+국가번호번호' 형식이 필요합니다.";
        }

        parent::__construct($message);
    }
}
