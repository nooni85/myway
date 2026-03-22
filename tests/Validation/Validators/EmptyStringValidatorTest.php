<?php

namespace EdenProject\MyWay\Tests\Validation\Validators;

use EdenProject\MyWay\Validation\Validators\EmptyStringValidator;
use EdenProject\MyWay\Exception\EmptyValueException;
use PHPUnit\Framework\TestCase;

class EmptyStringValidatorTest extends TestCase
{
    private EmptyStringValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new EmptyStringValidator();
    }

    /**
     * Test that an empty string throws an EmptyValueException.
     */
    public function testEmptyStringThrowsException(): void
    {
        $data = "";

        $this->expectException(EmptyValueException::class);
        $this->validator->isValid($data);
    }

    /**
     * Test that the string "0" throws an EmptyValueException because empty("0") is true in PHP.
     */
    public function testZeroStringThrowsException(): void
    {
        $data = "0";

        $this->expectException(EmptyValueException::class);
        $this->validator->isValid($data);
    }

    /**
     * Test that a non-empty string returns true.
     */
    public function testNonEmptyStringReturnsTrue(): void
    {
        $data = "asdfasdf";

        $result = $this->validator->isValid($data);

        $this->assertTrue($result);
    }

    /**
     * Test that a string with only whitespace is NOT considered empty by empty() function.
     */
    public function testWhitespaceOnlyStringReturnsTrue(): void
    {
        $data = " ";

        $result = $this->validator->isValid($data);

        $this->assertTrue($result);
    }
}
