<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class CheckoutFormInitializeTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_checkout_form()
    {
        $this->expectHttpPost();

        $checkoutFormInitialize = CheckoutFormInitialize::create(new CreateCheckoutFormInitializeRequest(), $this->options);

        $this->verifyResource($checkoutFormInitialize);
    }
}