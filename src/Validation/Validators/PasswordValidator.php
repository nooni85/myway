<?php

namespace EdenProject\MyWay\Validation\Validators;

use EdenProject\MyWay\Exception\InvalidPasswordException;
use EdenProject\MyWay\Validation\Validator;

/**
 * 비밀번호 보안 수준을 검증하는 벨리데이터
 * 기본 보안 수준: 최소 8자 이상, 영문 대문자, 소문자, 숫자 포함
 */
class PasswordValidator extends Validator
{
    /**
     * @inheritDoc
     * @throws InvalidPasswordException
     */
    protected function validate(string $data): bool
    {
        // 1. 최소 길이 확인 (8자)
        if (strlen($data) < 8) {
            throw new InvalidPasswordException("최소 8자 이상이어야 합니다.");
        }

        // 2. 영문 대문자 포함 여부 확인
        if (!preg_match('/[A-Z]/', $data)) {
            throw new InvalidPasswordException("최소 하나의 대문자가 포함되어야 합니다.");
        }

        // 3. 영문 소문자 포함 여부 확인
        if (!preg_match('/[a-z]/', $data)) {
            throw new InvalidPasswordException("최소 하나의 소문자가 포함되어야 합니다.");
        }

        // 4. 숫자 포함 여부 확인
        if (!preg_match('/[0-9]/', $data)) {
            throw new InvalidPasswordException("최소 하나의 숫자가 포함되어야 합니다.");
        }

        return true;
    }
}
