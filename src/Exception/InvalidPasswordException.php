<?php

namespace EdenProject\MyWay\Exception;

/**
 * 유효하지 않은 비밀번호 형식일 때 발생하는 예외
 */
class InvalidPasswordException extends \InvalidArgumentException
{
    public function __construct(string $reason = "")
    {
        $message = "유효하지 않은 비밀번호 형식입니다.";

        if (!empty($reason)) {
            $message .= " ($reason)";
        }

        parent::__construct($message);
    }
}
