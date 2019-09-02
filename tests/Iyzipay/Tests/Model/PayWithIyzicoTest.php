<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\PayWithIyzico;
use Iyzipay\Request\RetrievePayWithIyzicoRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PayWithIyzicoTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_pay_with_iyzico()
    {
        $this->expectHttpPost();

        $payWithIyzico = PayWithIyzico::retrieve(new RetrievePayWithIyzicoRequest(), $this->options);

        $this->verifyResource($payWithIyzico);
    }
}