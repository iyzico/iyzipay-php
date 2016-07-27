<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\CheckoutFormInitializePreAuth;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\CheckoutFormInitializePreAuthMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class CheckoutFormInitializePreAuthMapperTest extends TestCase
{
    public function test_should_map_checkout_form_initialize_pre_auth()
    {
        $json = $this->retrieveJsonFile("initialize-checkout-form.json");

        $checkoutFormInitializePreAuth = CheckoutFormInitializePreAuthMapper::create($json)->jsonDecode()->mapCheckoutFormInitializePreAuth(new CheckoutFormInitializePreAuth());

        $this->assertNotEmpty($checkoutFormInitializePreAuth);
        $this->assertEquals(Status::FAILURE, $checkoutFormInitializePreAuth->getStatus());
        $this->assertEquals("10000", $checkoutFormInitializePreAuth->getErrorCode());
        $this->assertEquals("error message", $checkoutFormInitializePreAuth->getErrorMessage());
        $this->assertEquals("ERROR_GROUP", $checkoutFormInitializePreAuth->getErrorGroup());
        $this->assertEquals(Locale::TR, $checkoutFormInitializePreAuth->getLocale());
        $this->assertEquals("1458545234852", $checkoutFormInitializePreAuth->getSystemTime());
        $this->assertEquals("123456", $checkoutFormInitializePreAuth->getConversationId());
        $this->assertEquals("token", $checkoutFormInitializePreAuth->getToken());
        $this->assertEquals("checkoutFormContent", $checkoutFormInitializePreAuth->getCheckoutFormContent());
        $this->assertEquals("3600", $checkoutFormInitializePreAuth->getTokenExpireTime());
        $this->assertEquals("url", $checkoutFormInitializePreAuth->getPaymentPageUrl());
        $this->assertJson($checkoutFormInitializePreAuth->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $checkoutFormInitializePreAuth->getRawResult());
    }
}