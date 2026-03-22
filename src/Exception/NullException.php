<?php

namespace EdenProject\MyWay\Exception;

use JetBrains\PhpStorm\Pure;

class NullException extends \RuntimeException
{
    #[Pure] public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}