<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest;
use Iyzipay\Tests\TestCase;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Customer;

class SubscriptionCreateCustomerRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();
        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("John", $jsonObject["name"]);;
        $this->assertEquals("Doe", $jsonObject["surname"]);
        $this->assertEquals("+905555555555", $jsonObject["gsmNumber"]);
        $this->assertEquals("johndoe@iyzico.com", $jsonObject["email"]);
        $this->assertEquals("11111111111", $jsonObject["identityNumber"]);
        $this->assertEquals("John Doe", $jsonObject["shippingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["shippingAddress"]["city"]);
        $this->assertEquals("altunizade", $jsonObject["shippingAddress"]["district"]);
        $this->assertEquals("Turkey", $jsonObject["shippingAddress"]["country"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["shippingAddress"]["address"]);
        $this->assertEquals("34660", $jsonObject["shippingAddress"]["zipCode"]);
        $this->assertEquals("John Doe", $jsonObject["billingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["billingAddress"]["city"]);
        $this->assertEquals("altunizade", $jsonObject["billingAddress"]["district"]);
        $this->assertEquals("Turkey", $jsonObject["billingAddress"]["country"]);
        $this->assertEquals("Uskudar Burhaniye Mahallesi iyzico A.S", $jsonObject["billingAddress"]["address"]);
        $this->assertEquals("34660", $jsonObject["billingAddress"]["zipCode"]);

    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '{
                      "locale":"tr",
                      "conversationId":"123456789",
                      "billingAddress": {
                        "address": "Uskudar Burhaniye Mahallesi iyzico A.S",
                        "city": "Istanbul",
                        "district": "altunizade",
                        "contactName": "John Doe",
                        "country": "Turkey",
                        "zipCode": "34660"
                      },
                      "email": "johndoe@iyzico.com",
                      "gsmNumber": "+905555555555",
                      "identityNumber": "11111111111",
                      "name": "John",
                      "shippingAddress": {
                        "address": "Uskudar Burhaniye Mahallesi iyzico A.S",
                        "city": "Istanbul",
                        "district": "altunizade",
                        "contactName": "John Doe",
                        "country": "Turkey",
                        "zipCode": "34660"
                      },
                      "surname": "Doe"
                }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    public function test_should_convert_customer_to_pki_request_string()
    {
        $customer = new Customer();
        $customer->setName("John");
        $customer->setSurname("Doe");
        $customer->setGsmNumber("+905555555555");
        $customer->setEmail("johndoe@iyzicotest.com");
        $customer->setIdentityNumber("11111111111");
        $customer->setShippingContactName("John Doe");
        $customer->setShippingCity("Istanbul");
        $customer->setShippingDistrict("altunizade");
        $customer->setShippingCountry("Turkey");
        $customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setShippingZipCode("34660");
        $customer->setBillingContactName("John Doe");
        $customer->setBillingCity("Istanbul");
        $customer->setBillingDistrict("altunizade");
        $customer->setBillingCountry("Turkey");
        $customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setBillingZipCode("34660");
        $str = "[name=John,surname=Doe,identityNumber=11111111111,email=johndoe@iyzicotest.com,gsmNumber=+905555555555,billingAddress=[contactName=John Doe,city=Istanbul,district=altunizade,country=Turkey,address=Uskudar Burhaniye Mahallesi iyzico A.S,zipCode=34660],shippingAddress=[contactName=John Doe,city=Istanbul,district=altunizade,country=Turkey,address=Uskudar Burhaniye Mahallesi iyzico A.S,zipCode=34660]]";
        $this->assertEquals($str, $customer->toPKIRequestString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionCreateCustomerRequest();
        $request->setLocale("tr");
        $request->setConversationId("123456789");
        $customer = new Customer();
        $customer->setName("John");
        $customer->setSurname("Doe");
        $customer->setGsmNumber("+905555555555");
        $customer->setEmail("johndoe@iyzico.com");
        $customer->setIdentityNumber("11111111111");
        $customer->setShippingContactName("John Doe");
        $customer->setShippingCity("Istanbul");
        $customer->setShippingDistrict("altunizade");
        $customer->setShippingCountry("Turkey");
        $customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setShippingZipCode("34660");
        $customer->setBillingContactName("John Doe");
        $customer->setBillingCity("Istanbul");
        $customer->setBillingDistrict("altunizade");
        $customer->setBillingCountry("Turkey");
        $customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setBillingZipCode("34660");
        $request->setCustomer($customer);
        return $request;
    }
}
