<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CheckoutFormInitializeMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CheckoutFormInitializeMapperTest extends TestCase
{
    public function test_should_map_checkout_form_initialize()
    {
        $json = $this->retrieveJsonFile("initialize-checkout-form.json");

        $checkoutFormInitialize = CheckoutFormInitializeMapper::create($json)->jsonDecode()->mapCheckoutFormInitialize(new CheckoutFormInitialize());

        $this->assertNotEmpty($checkoutFormInitialize);
        $this->assertEquals(Status::FAILURE, $checkoutFormInitialize->getStatus());
        $this->assertEquals("10000", $checkoutFormInitialize->getErrorCode());
        $this->assertEquals("error message", $checkoutFormInitialize->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $checkoutFormInitialize->getErrorGroup());
        $this->assertEquals(Locale::TR, $checkoutFormInitialize->getLocale());
        $this->assertEquals("1458545234852", $checkoutFormInitialize->getSystemTime());
        $this->assertEquals("123456", $checkoutFormInitialize->getConversationId());
        $this->assertEquals("token", $checkoutFormInitialize->getToken());
        $this->assertEquals("checkoutFormContent", $checkoutFormInitialize->getCheckoutFormContent());
        $this->assertEquals("3600", $checkoutFormInitialize->getTokenExpireTime());
        $this->assertEquals("url", $checkoutFormInitialize->getPaymentPageUrl());
        $this->assertJson($checkoutFormInitialize->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $checkoutFormInitialize->getRawResult());
    }
}