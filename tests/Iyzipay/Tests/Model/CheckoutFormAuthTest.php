<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\CheckoutFormAuth;
use Iyzipay\Request\RetrieveCheckoutFormAuthRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class CheckoutFormAuthTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_checkout_form_auth()
    {
        $this->expectHttpPost();

        $checkoutFormAuth = CheckoutFormAuth::retrieve(new RetrieveCheckoutFormAuthRequest(), $this->options);

        $this->verifyResource($checkoutFormAuth);
    }
}