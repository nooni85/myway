<?php

namespace EdenProject\MyWay\Validation;

use Exception;

abstract class Validator
{
    protected ?Validator $nextValidator = null;

    /**
     * Set the next validator in the chain.
     *
     * @param Validator $validator
     * @return Validator
     */
    public function setNext(Validator $validator): Validator
    {
        $this->nextValidator = $validator;
        return $this;
    }

    /**
     * Validate the given data.
     *
     * @param string $data
     */
    abstract protected function validate(string $data): bool;

    /**
     * Check if the given data is valid.
     *
     * @param string $data
     */
    public function isValid(string $data): bool
    {
        $result = $this->validate($data);

        $this->nextValidator?->isValid($data);

        return $result;
    }
}
