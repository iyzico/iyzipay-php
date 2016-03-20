<?php

namespace Iyzipay\Tests;

use Iyzipay\RequestFormatter;

class RequestFormatterTest extends TestCase
{
    public function test_should_append_zero_given_integer()
    {
        $this->assertEquals("100230.0", RequestFormatter::formatPrice("100230"));
    }

    public function test_should_not_append_zero_given_integer_as_decimal()
    {
        $this->assertEquals("100230.0", RequestFormatter::formatPrice("100230.0"));
    }

    public function test_should_remain_decimal_given_not_contains_zero()
    {
        $this->assertEquals("100230.23", RequestFormatter::formatPrice("100230.23"));
    }

    public function test_should_remove_zero_given_decimal()
    {
        $this->assertEquals("100230.23", RequestFormatter::formatPrice("100230.23000"));
    }

    public function test_should_remain_decimal_given_contains_zero()
    {
        $this->assertEquals("100230.2300045", RequestFormatter::formatPrice("100230.2300045"));
    }
}