<?php

namespace Iyzipay\Tests\Model\Mapper\Subscription;

use Iyzipay\Model\Mapper\Subscription\SubscriptionCustomerResourceMapper;
use Iyzipay\Model\Subscription\SubscriptionCustomer;
use Iyzipay\Tests\TestCase;

class SubscriptionCustomerResourceMapperTest extends TestCase
{
    public function test_should_map_subscription_customer_resource_mapper()
    {
        $json = $this->retrieveJsonFile("subscription_customer.json");
        $customer = SubscriptionCustomerResourceMapper::create($json)->jsonDecode()->mapSubscriptionCustomer(new SubscriptionCustomer());

        $this->assertNotEmpty($customer);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $customer->getBillingAddressAddress());
        $this->assertEquals("Istanbul", $customer->getBillingAddressCity());
        $this->assertEquals("John Doe", $customer->getBillingAddressContactName());
        $this->assertEquals("Turkey", $customer->getBillingAddressCountry());
        $this->assertEquals("34660", $customer->getBillingAddressZipCode());
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $customer->getShippingAddressAddress());
        $this->assertEquals("Istanbul", $customer->getShippingAddressCity());
        $this->assertEquals("John Doe", $customer->getShippingAddressContactName());
        $this->assertEquals("Turkey", $customer->getShippingAddressCountry());
        $this->assertEquals("34660", $customer->getShippingAddressZipCode());
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