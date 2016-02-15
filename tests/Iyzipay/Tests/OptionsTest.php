<?php

class OptionsTest extends PHPUnit_Framework_TestCase
{
    public function test_should_set_and_retrieve_fields()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("base url");

        $this->assertEquals("api key", $options->getApiKey());
        $this->assertEquals("secret key", $options->getSecretKey());
        $this->assertEquals("base url", $options->getBaseUrl());
    }
}