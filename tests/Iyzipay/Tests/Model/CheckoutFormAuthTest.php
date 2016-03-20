<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\CheckoutFormAuth;
use Iyzipay\Request\RetrieveCheckoutFormAuthRequest;

class CheckoutFormAuthTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_checkout_form_auth()
    {
        $this->expectHttpPost();

        $checkoutFormAuth = CheckoutFormAuth::retrieve(new RetrieveCheckoutFormAuthRequest(), $this->options);

        $this->verifyResource($checkoutFormAuth);
    }
}