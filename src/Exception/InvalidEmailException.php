<?php

namespace EdenProject\MyWay\Exception;

/**
 * 유효하지 않은 이메일 형식일 때 발생하는 예외
 */
class InvalidEmailException extends \InvalidArgumentException
{
    public function __construct(string $email = "")
    {
        $message = "유효하지 않은 이메일 형식입니다.";

        if (!empty($email)) {
            $message = "[$email]은(는) 유효하지 않은 이메일 형식입니다.";
        }

        parent::__construct($message);
    }
}
