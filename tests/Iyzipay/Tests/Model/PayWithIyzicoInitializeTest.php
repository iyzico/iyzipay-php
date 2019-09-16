<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PayWithIyzicoInitialize;
use Iyzipay\Request\CreatePayWithIyzicoInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PayWithIyzicoInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_pay_with_iyzico()
    {
        $this->expectHttpPost();

        $payWithIyzicoInitialize = PayWithIyzicoInitialize::create(new CreatePayWithIyzicoInitializeRequest(), $this->options);

        $this->verifyResource($payWithIyzicoInitialize);
    }
}