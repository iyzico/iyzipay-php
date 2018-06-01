<?php

namespace Iyzipay\Tests;

use Iyzipay\Options;

class OptionsValidTest extends TestCase
{
    public function test_should_not_set_empty_fields()
    {
        $options = new Options();

        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("base url");

        $this->assertNotEquals("", $options->getApiKey());
        $this->assertNotEquals("", $options->getSecretKey());
        $this->assertNotEquals("", $options->getBaseUrl());

        $this->assertNotEquals(NULL, $options->getApiKey());
        $this->assertNotEquals(NULL, $options->getSecretKey());
        $this->assertNotEquals(NULL, $options->getBaseUrl());
    }
}
