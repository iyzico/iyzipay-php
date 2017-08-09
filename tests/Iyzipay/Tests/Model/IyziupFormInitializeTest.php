<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\IyziupFormInitialize;
use Iyzipay\Request\CreateIyziupFormInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziupFormInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_iyziup_form()
    {
        $this->expectHttpPost();

        $iyziupFormInitialize = IyziupFormInitialize::create(new CreateIyziupFormInitializeRequest(), $this->options);

        $this->verifyResource($iyziupFormInitialize);
    }
}