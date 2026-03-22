<?php

namespace EdenProject\MyWay\Exception;

class EmptyValueException extends \InvalidArgumentException
{
    public function __construct(string $varName = "")
    {
        $t_val = "value is empty";

        if (!empty($varName)) {
            $t_val = "$varName value is empty";
        }

        parent::__construct($t_val);
    }
}
