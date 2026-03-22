<?php

namespace EdenProject\MyWay\Validation\Validators;

use EdenProject\MyWay\Exception\EmptyValueException;
use EdenProject\MyWay\Validation\Validator;

class EmptyStringValidator extends Validator
{
    protected function validate(string $data): bool
    {
        if (empty($data)) {
            throw new EmptyValueException();
        }

        return true;
    }
}
