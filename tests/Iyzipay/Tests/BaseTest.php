<?php

namespace Iyzipay\Tests;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    protected function callMethod($obj, $name, array $args)
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method->invokeArgs($obj, $args);
    }

    public function test_should_be_true()
    {
        $this->assertTrue(true);
    }
}