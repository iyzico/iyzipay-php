<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\CheckoutFormInitializePreAuth;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CheckoutFormInitializePreAuthTest extends IyzipayResourceTestCase
{
    public function test_should_initialize_checkout_form_pre_auth()
    {
        $this->expectHttpPost();

        $checkoutFormInitializePreAuth = CheckoutFormInitializePreAuth::create(new CreateCheckoutFormInitializeRequest(), $this->options);

        $this->verifyResource($checkoutFormInitializePreAuth);
    }
}