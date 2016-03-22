<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CheckoutFormInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_checkout_form()
    {
        $this->expectHttpPost();

        $checkoutFormInitialize = CheckoutFormInitialize::create(new CreateCheckoutFormInitializeRequest(), $this->options);

        $this->verifyResource($checkoutFormInitialize);
    }
}