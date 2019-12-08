<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionCustomerMapper;
use Iyzipay\Model\Subscription\SubscriptionCustomer;
use Iyzipay\Tests\TestCase;

class SubscriptionCustomerMapperTest extends TestCase
{
    public function test_should_map_subscription_customer_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_customer.json");
        $customer = SubscriptionCustomerMapper::create($json)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());

        $this->assertNotEmpty($customer);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $customer->getBillingAddress());
        $this->assertEquals("Istanbul", $customer->getBillingCity());
        $this->assertEquals("John Doe", $customer->getBillingContactName());
        $this->assertEquals("Turkey", $customer->getBillingCountry());
        $this->assertEquals("34660", $customer->getBillingZipCode());
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $customer->getShippingAddress());
        $this->assertEquals("Istanbul", $customer->getShippingCity());
        $this->assertEquals("John Doe", $customer->getShippingContactName());
        $this->assertEquals("Turkey", $customer->getShippingCountry());
        $this->assertEquals("34660", $customer->getShippingZipCode());
        $this->assertEquals( "b371b770-6f78-41c5-82ec-838fe37ba472", $customer->getReferenceCode());
        $this->assertEquals("John", $customer->getName());
        $this->assertEquals("Doe", $customer->getSurname());
        $this->assertEquals("1562179188326", $customer->getCreatedDate());
        $this->assertEquals("johndoe@iyzico.com", $customer->getEmail());
        $this->assertEquals("11111111111", $customer->getIdentityNumber());
        $this->assertEquals("+905555555555", $customer->getGsmNumber());
        $this->assertEquals("success", $customer->getStatus());
        $this->assertEquals("ACTIVE", $customer->getCustomerStatus());
        $this->assertEquals(null, $customer->getErrorCode());
        $this->assertEquals(null, $customer->getErrorMessage());
        $this->assertEquals(null, $customer->getErrorGroup());
        $this->assertEquals("1562179188348", $customer->getSystemTime());
        $this->assertJson($customer->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $customer->getRawResult());

    }
}