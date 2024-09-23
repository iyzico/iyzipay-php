<?php

namespace Iyzipay\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Iyzipay\Options;

class TestCase extends BaseTestCase
{
    protected $options;

    protected function setUp(): void
    {
        $this->options = new Options();
        $this->options->setApiKey("apiKey");
        $this->options->setSecretKey("secretKey");
        $this->options->setBaseUrl("baseUrl");
    }

    protected function callMethod($obj, $name, array $args)
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method->invokeArgs($obj, $args);
    }

    public function test_should_check_if_options_not_empty()
    {
        $this->options = new Options();
        $this->assertNotEmpty($this->options);
    }

    public function retrieveJsonFile($file)
    {
        return file_get_contents(__DIR__ . '/mock/' . $file, true);
    }
}
