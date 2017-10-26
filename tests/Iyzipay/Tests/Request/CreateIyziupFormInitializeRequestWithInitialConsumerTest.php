<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Currency;
use Iyzipay\Model\InitialConsumer;
use Iyzipay\Model\IyziupAddress;
use Iyzipay\Model\Locale;
use Iyzipay\Model\OrderItem;
use Iyzipay\Model\OrderItemType;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreateIyziupFormInitializeRequest;
use Iyzipay\Tests\TestCase;

class CreateIyziupFormInitializeRequestWithInitialConsumerTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("B67832", $jsonObject["merchantOrderId"]);
        $this->assertEquals(PaymentGroup::PRODUCT, $jsonObject["paymentGroup"]);
        $this->assertEquals("source", $jsonObject["paymentSource"]);
        $this->assertEquals(1, $jsonObject["forceThreeDS"]);
        $this->assertEquals(array(1, 2, 3, 6, 9), $jsonObject["enabledInstallments"]);
        $this->assertEquals("Bonus", $jsonObject["enabledCardFamily"]);
        $this->assertEquals(Currency::TL, $jsonObject["currency"]);
        $this->assertEquals("1", $jsonObject["price"]);
        $this->assertEquals("1.2", $jsonObject["paidPrice"]);
        $this->assertEquals("0.2", $jsonObject["shippingPrice"]);
        $this->assertEquals("https://www.merchant.com/callback", $jsonObject["callbackUrl"]);
        $this->assertEquals("https://www.merchant.com/terms", $jsonObject["termsUrl"]);
        $this->assertEquals("https://www.merchant.com/preSalesContract", $jsonObject["preSalesContractUrl"]);
        $this->assertEquals("Binocular", $jsonObject["orderItems"][0]["name"]);
        $this->assertEquals("Collectibles", $jsonObject["orderItems"][0]["category1"]);
        $this->assertEquals("Accessories", $jsonObject["orderItems"][0]["category2"]);
        $this->assertEquals(OrderItemType::PHYSICAL, $jsonObject["orderItems"][0]["itemType"]);
        $this->assertEquals("0.3", $jsonObject["orderItems"][0]["price"]);
        $this->assertEquals("www.merchant.com/item1.html", $jsonObject["orderItems"][0]["itemUrl"]);
        $this->assertEquals("a handheld optical instrument composed of two telescopes", $jsonObject["orderItems"][0]["itemDescription"]);

        $initialConsumerObject = $jsonObject["initialConsumer"];
        $this->assertEquals("ConsumerName", $initialConsumerObject["name"]);
        $this->assertEquals("ConsumerSurname", $initialConsumerObject["surname"]);
        $this->assertEquals("consumerName@mail.com", $initialConsumerObject["email"]);
        $this->assertEquals("+905556667788", $initialConsumerObject["gsmNumber"]);

        $homeAddress = $initialConsumerObject["addressList"][0];
        $this->assertEquals("HomeAddress", $homeAddress["alias"]);
        $this->assertEquals("Home Address Line 1", $homeAddress["addressLine1"]);
        $this->assertEquals("Home Address Line 2", $homeAddress["addressLine2"]);
        $this->assertEquals("HomeZipCode", $homeAddress["zipCode"]);
        $this->assertEquals("HomeConsumerName HomeConsumerSurname", $homeAddress["contactName"]);
        $this->assertEquals("HomeCity", $homeAddress["city"]);
        $this->assertEquals("HomeCountry", $homeAddress["country"]);

        $workAddress = $initialConsumerObject["addressList"][1];
        $this->assertEquals("WorkAddress", $workAddress["alias"]);
        $this->assertEquals("Work Address Line 1", $workAddress["addressLine1"]);
        $this->assertEquals("Work Address Line 2", $workAddress["addressLine2"]);
        $this->assertEquals("WorkZipCode", $workAddress["zipCode"]);
        $this->assertEquals("WorkConsumerName WorkConsumerSurname", $workAddress["contactName"]);
        $this->assertEquals("WorkCity", $workAddress["city"]);
        $this->assertEquals("WorkCountry", $workAddress["country"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $str =
            "[" .
            "locale=tr," .
            "conversationId=123456789," .
            "merchantOrderId=B67832," .
            "paymentGroup=PRODUCT," .
            "paymentSource=source," .
            "forceThreeDS=1," .
            "enabledInstallments=[1, 2, 3, 6, 9]," .
            "enabledCardFamily=Bonus," .
            "currency=TRY," .
            "price=1.0," .
            "paidPrice=1.2," .
            "shippingPrice=0.2," .
            "callbackUrl=https://www.merchant.com/callback," .
            "termsUrl=https://www.merchant.com/terms," .
            "preSalesContractUrl=https://www.merchant.com/preSalesContract," .
            "orderItems=[[id=BI101," .
            "price=0.3," .
            "name=Binocular," .
            "category1=Collectibles," .
            "category2=Accessories," .
            "itemType=PHYSICAL," .
            "itemUrl=www.merchant.com/item1.html," .
            "itemDescription=a handheld optical instrument composed of two telescopes]]," .
            "initialConsumer=" .
            "[" .
            "name=ConsumerName," .
            "surname=ConsumerSurname," .
            "email=consumerName@mail.com," .
            "gsmNumber=+905556667788," .
            "addressList=" .
            "[" .
            "[alias=HomeAddress,addressLine1=Home Address Line 1,addressLine2=Home Address Line 2,zipCode=HomeZipCode,contactName=HomeConsumerName HomeConsumerSurname,city=HomeCity,country=HomeCountry], " .
            "[alias=WorkAddress,addressLine1=Work Address Line 1,addressLine2=Work Address Line 2,zipCode=WorkZipCode,contactName=WorkConsumerName WorkConsumerSurname,city=WorkCity,country=WorkCountry]" .
            "]" .
            "]" .
            "]";
        $request = $this->prepareRequest();

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
        {
                "locale":"tr",
                "conversationId":"123456789",
                "merchantOrderId":"B67832",
                "paymentGroup":"PRODUCT",
                "paymentSource":"source",
                "forceThreeDS":"1",
                "enabledInstallments":[1,2,3,6,9],
                "enabledCardFamily":"Bonus",
                "currency":"TRY",
                "price":"1.0",
                "paidPrice":"1.2",
                "shippingPrice":"0.2",
                "callbackUrl":"https://www.merchant.com/callback",
                "termsUrl":"https://www.merchant.com/terms",
                "preSalesContractUrl":"https://www.merchant.com/preSalesContract",
                "orderItems":
                [
                    {
                        "id":"BI101",
                        "price":"0.3",
                        "name":"Binocular",
                        "category1":"Collectibles",
                        "category2":"Accessories",
                        "itemType":"PHYSICAL",
                        "itemUrl":"www.merchant.com/item1.html",
                        "itemDescription":"a handheld optical instrument composed of two telescopes"
                    }
                ],
                "initialConsumer":
                {
                  "name": "ConsumerName",
                  "surname": "ConsumerSurname",
                  "email": "consumerName@mail.com",
                  "gsmNumber": "+905556667788",
                  "addressList": [
                    {
                      "alias": "HomeAddress",
                      "addressLine1": "Home Address Line 1",
                      "addressLine2": "Home Address Line 2",
                      "zipCode": "HomeZipCode",
                      "contactName": "HomeConsumerName HomeConsumerSurname",
                      "city": "HomeCity",
                      "country": "HomeCountry"
                    },
                    {
                      "alias": "WorkAddress",
                      "addressLine1": "Work Address Line 1",
                      "addressLine2": "Work Address Line 2",
                      "zipCode": "WorkZipCode",
                      "contactName": "WorkConsumerName WorkConsumerSurname",
                      "city": "WorkCity",
                      "country": "WorkCountry"
                    }
                  ]
                }
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateIyziupFormInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setMerchantOrderId("B67832");
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setPaymentSource("source");
        $request->setForceThreeDS(1);
        $request->setEnabledInstallments(array(1, 2, 3, 6, 9));
        $request->setEnabledCardFamily("Bonus");
        $request->setCurrency(Currency::TL);
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setShippingPrice("0.2");
        $request->setCallbackUrl("https://www.merchant.com/callback");
        $request->setTermsUrl("https://www.merchant.com/terms");
        $request->setPreSalesContractUrl("https://www.merchant.com/preSalesContract");

        $orderItems = array();
        $firstOrderItem = new OrderItem();
        $firstOrderItem->setId("BI101");
        $firstOrderItem->setName("Binocular");
        $firstOrderItem->setCategory1("Collectibles");
        $firstOrderItem->setCategory2("Accessories");
        $firstOrderItem->setItemType(OrderItemType::PHYSICAL);
        $firstOrderItem->setPrice("0.3");
        $firstOrderItem->setItemUrl("www.merchant.com/item1.html");
        $firstOrderItem->setItemDescription("a handheld optical instrument composed of two telescopes");
        $orderItems[0] = $firstOrderItem;
        $request->setOrderItems($orderItems);

        $initialConsumer = new InitialConsumer();
        $initialConsumer->setName("ConsumerName");
        $initialConsumer->setSurname("ConsumerSurname");
        $initialConsumer->setEmail("consumerName@mail.com");
        $initialConsumer->setGsmNumber("+905556667788");

        $addressList = array();
        $homeAddress = new IyziupAddress();
        $homeAddress->setAlias("HomeAddress");
        $homeAddress->setAddressLine1("Home Address Line 1");
        $homeAddress->setAddressLine2("Home Address Line 2");
        $homeAddress->setZipCode("HomeZipCode");
        $homeAddress->setContactName("HomeConsumerName HomeConsumerSurname");
        $homeAddress->setCity("HomeCity");
        $homeAddress->setCountry("HomeCountry");
        $addressList[0] = $homeAddress;

        $workAddress = new IyziupAddress();
        $workAddress->setAlias("WorkAddress");
        $workAddress->setAddressLine1("Work Address Line 1");
        $workAddress->setAddressLine2("Work Address Line 2");
        $workAddress->setZipCode("WorkZipCode");
        $workAddress->setContactName("WorkConsumerName WorkConsumerSurname");
        $workAddress->setCity("WorkCity");
        $workAddress->setCountry("WorkCountry");
        $addressList[1] = $workAddress;
        $initialConsumer->setAddressList($addressList);

        $request->setInitialConsumer($initialConsumer);
        return $request;
    }
}