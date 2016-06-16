<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PeccoInitialize;
use Iyzipay\Request\CreatePeccoInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PeccoInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_pecco()
    {
        $this->expectHttpPost();

        $peccoInitialize = PeccoInitialize::create(new CreatePeccoInitializeRequest(), $this->options);

        $this->verifyResource($peccoInitialize);
    }
}