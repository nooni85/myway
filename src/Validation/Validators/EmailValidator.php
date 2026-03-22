<?php

namespace EdenProject\MyWay\Validation\Validators;

use EdenProject\MyWay\Exception\InvalidEmailException;
use EdenProject\MyWay\Validation\Validator;

/**
 * 이메일 형식을 검증하는 벨리데이터
 */
class EmailValidator extends Validator
{
    /**
     * @inheritDoc
     * @throws InvalidEmailException
     */
    protected function validate(string $data): bool
    {
        // PHP 내장 필터를 사용하여 이메일 형식 검증
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException($data);
        }

        return true;
    }
}
