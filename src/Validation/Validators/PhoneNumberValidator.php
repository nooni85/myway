<?php

namespace EdenProject\MyWay\Validation\Validators;

use EdenProject\MyWay\Exception\InvalidPhoneNumberException;
use EdenProject\MyWay\Validation\Validator;

/**
 * 전화번호 형식을 검증하는 벨리데이터
 * 형식: +국가번호번호 (예: +8201025241365)
 */
class PhoneNumberValidator extends Validator
{
    /**
     * @inheritDoc
     * @throws InvalidPhoneNumberException
     */
    protected function validate(string $data): bool
    {
        // 정규표현식: '+'로 시작하고 그 뒤에 7자리에서 15자리의 숫자가 오는 형식 (E.164 표준 기반)
        if (!preg_match('/^\+\d{7,15}$/', $data)) {
            throw new InvalidPhoneNumberException($data);
        }

        return true;
    }
}
