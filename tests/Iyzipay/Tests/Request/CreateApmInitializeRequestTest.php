<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Address;
use Iyzipay\Model\ApmType;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreateApmInitializeRequest;
use Iyzipay\Tests\TestCase;

class CreateApmInitializeRequestTest extends TestCase
{
    public function test_should_get_json_object()
    {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject["locale"]);
        $this->assertEquals("123456789", $jsonObject["conversationId"]);
        $this->assertEquals("1.0", $jsonObject["price"]);
        $this->assertEquals("1.2", $jsonObject["paidPrice"]);
        $this->assertEquals(PaymentChannel::WEB, $jsonObject["paymentChannel"]);
        $this->assertEquals(PaymentGroup::PRODUCT, $jsonObject["paymentGroup"]);
        $this->assertEquals("Payment Source", $jsonObject["paymentSource"]);
        $this->assertEquals(Currency::EUR, $jsonObject["currency"]);
        $this->assertEquals("B123456", $jsonObject["basketId"]);
        $this->assertEquals("123456", $jsonObject["merchantOrderId"]);
        $this->assertEquals("DE", $jsonObject["countryCode"]);
        $this->assertEquals("John Doe", $jsonObject["accountHolderName"]);
        $this->assertEquals("https://www.merchant.com/callback", $jsonObject["merchantCallbackUrl"]);
        $this->assertEquals("https://www.merchant.com/error", $jsonObject["merchantErrorUrl"]);
        $this->assertEquals("https://www.merchant.com/notification", $jsonObject["merchantNotificationUrl"]);
        $this->assertEquals(ApmType::SOFORT, $jsonObject["apmType"]);
        $this->assertEquals("BY789", $jsonObject["buyer"]["id"]);
        $this->assertEquals("John", $jsonObject["buyer"]["name"]);
        $this->assertEquals("Doe", $jsonObject["buyer"]["surname"]);
        $this->assertEquals("74300864791", $jsonObject["buyer"]["identityNumber"]);
        $this->assertEquals("email@email.com", $jsonObject["buyer"]["email"]);
        $this->assertEquals("905350000000", $jsonObject["buyer"]["gsmNumber"]);
        $this->assertEquals("2013-04-21 15:12:09", $jsonObject["buyer"]["registrationDate"]);
        $this->assertEquals("2015-10-05 12:43:35", $jsonObject["buyer"]["lastLoginDate"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["buyer"]["registrationAddress"]);
        $this->assertEquals("Istanbul", $jsonObject["buyer"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["buyer"]["country"]);
        $this->assertEquals("34732", $jsonObject["buyer"]["zipCode"]);
        $this->assertEquals("85.34.78.112", $jsonObject["buyer"]["ip"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["shippingAddress"]["address"]);
        $this->assertEquals("34742", $jsonObject["shippingAddress"]["zipCode"]);
        $this->assertEquals("Jane Doe", $jsonObject["shippingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["shippingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["shippingAddress"]["country"]);
        $this->assertEquals("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1", $jsonObject["billingAddress"]["address"]);
        $this->assertEquals("34742", $jsonObject["billingAddress"]["zipCode"]);
        $this->assertEquals("Jane Doe", $jsonObject["billingAddress"]["contactName"]);
        $this->assertEquals("Istanbul", $jsonObject["billingAddress"]["city"]);
        $this->assertEquals("Turkey", $jsonObject["billingAddress"]["country"]);
        $this->assertEquals("BI101", $jsonObject["basketItems"][0]["id"]);
        $this->assertEquals("0.3", $jsonObject["basketItems"][0]["price"]);
        $this->assertEquals("Binocular", $jsonObject["basketItems"][0]["name"]);
        $this->assertEquals("Collectibles", $jsonObject["basketItems"][0]["category1"]);
        $this->assertEquals("Accessories", $jsonObject["basketItems"][0]["category2"]);
        $this->assertEquals(BasketItemType::PHYSICAL, $jsonObject["basketItems"][0]["itemType"]);
        $this->assertEquals("BI102", $jsonObject["basketItems"][1]["id"]);
        $this->assertEquals("0.5", $jsonObject["basketItems"][1]["price"]);
        $this->assertEquals("Game code", $jsonObject["basketItems"][1]["name"]);
        $this->assertEquals("Game", $jsonObject["basketItems"][1]["category1"]);
        $this->assertEquals("Online Game Items", $jsonObject["basketItems"][1]["category2"]);
        $this->assertEquals(BasketItemType::VIRTUAL, $jsonObject["basketItems"][1]["itemType"]);
        $this->assertEquals("BI103", $jsonObject["basketItems"][2]["id"]);
        $this->assertEquals("0.2", $jsonObject["basketItems"][2]["price"]);
        $this->assertEquals("Usb", $jsonObject["basketItems"][2]["name"]);
        $this->assertEquals("Electronics", $jsonObject["basketItems"][2]["category1"]);
        $this->assertEquals("Usb / Cable", $jsonObject["basketItems"][2]["category2"]);
        $this->assertEquals(BasketItemType::PHYSICAL, $jsonObject["basketItems"][2]["itemType"]);
    }

    public function test_should_convert_to_pki_request_string()
    {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "price=1.0," .
            "paidPrice=1.2," .
            "paymentChannel=WEB," .
            "paymentGroup=PRODUCT," .
            "paymentSource=Payment Source," .
            "currency=EUR," .
            "merchantOrderId=123456," .
            "countryCode=DE," .
            "accountHolderName=John Doe," .
            "merchantCallbackUrl=https://www.merchant.com/callback," .
            "merchantErrorUrl=https://www.merchant.com/error," .
            "merchantNotificationUrl=https://www.merchant.com/notification," .
            "apmType=SOFORT," .
            "basketId=B123456," .
            "buyer=[id=BY789," .
            "name=John," .
            "surname=Doe," .
            "identityNumber=74300864791," .
            "email=email@email.com," .
            "gsmNumber=905350000000," .
            "registrationDate=2013-04-21 15:12:09," .
            "lastLoginDate=2015-10-05 12:43:35," .
            "registrationAddress=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1," .
            "city=Istanbul," .
            "country=Turkey," .
            "zipCode=34732," .
            "ip=85.34.78.112]," .
            "shippingAddress=[address=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1," .
            "zipCode=34742," .
            "contactName=Jane Doe," .
            "city=Istanbul," .
            "country=Turkey]," .
            "billingAddress=[address=Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1," .
            "zipCode=34742," .
            "contactName=Jane Doe," .
            "city=Istanbul," .
            "country=Turkey]," .
            "basketItems=[[id=BI101," .
            "price=0.3," .
            "name=Binocular," .
            "category1=Collectibles," .
            "category2=Accessories," .
            "itemType=PHYSICAL], " .
            "[id=BI102," .
            "price=0.5," .
            "name=Game code," .
            "category1=Game," .
            "category2=Online Game Items," .
            "itemType=VIRTUAL], " .
            "[id=BI103," .
            "price=0.2," .
            "name=Usb," .
            "category1=Electronics," .
            "category2=Usb / Cable," .
            "itemType=PHYSICAL]]]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "price":"1.0",
                "paidPrice":"1.2",
                "paymentChannel":"WEB",
                "paymentGroup":"PRODUCT",
                "paymentSource":"Payment Source",
                "currency":"EUR",
                "basketId":"B123456",
                "merchantOrderId":"123456",
                "countryCode":"DE",
                "accountHolderName":"John Doe",
                "merchantCallbackUrl":"https://www.merchant.com/callback",
                "merchantErrorUrl":"https://www.merchant.com/error",
                "merchantNotificationUrl":"https://www.merchant.com/notification",
                "apmType":"SOFORT",
                "buyer":
                {
                    "id":"BY789",
                    "name":"John",
                    "surname":"Doe",
                    "identityNumber":"74300864791",
                    "email":"email@email.com",
                    "gsmNumber":"905350000000",
                    "registrationDate":"2013-04-21 15:12:09",
                    "lastLoginDate":"2015-10-05 12:43:35",
                    "registrationAddress":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "city":"Istanbul",
                    "country":"Turkey",
                    "zipCode":"34732",
                    "ip":"85.34.78.112"
                },
                "shippingAddress":
                {
                    "address":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "zipCode":"34742",
                    "contactName":"Jane Doe",
                    "city":"Istanbul",
                    "country":"Turkey"
                },
                "billingAddress":
                {
                    "address":"Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1",
                    "zipCode":"34742",
                    "contactName":"Jane Doe",
                    "city":"Istanbul",
                    "country":"Turkey"
                },
                "basketItems":
                [
                    {
                        "id":"BI101",
                        "price":"0.3",
                        "name":"Binocular",
                        "category1":"Collectibles",
                        "category2":"Accessories",
                        "itemType":"PHYSICAL"
                    },
                    {
                        "id":"BI102",
                        "price":"0.5",
                        "name":"Game code",
                        "category1":"Game",
                        "category2":"Online Game Items",
                        "itemType":"VIRTUAL"
                    },
                    {
                        "id":"BI103",
                        "price":"0.2",
                        "name":"Usb",
                        "category1":"Electronics",
                        "category2":"Usb / Cable",
                        "itemType":"PHYSICAL"
                    }
                ]
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new CreateApmInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(Currency::EUR);
        $request->setCountryCode("DE");
        $request->setBasketId("B123456");
        $request->setMerchantOrderId("123456");
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setPaymentSource("Payment Source");
        $request->setAccountHolderName("John Doe");
        $request->setMerchantCallbackUrl("https://www.merchant.com/callback");
        $request->setMerchantErrorUrl("https://www.merchant.com/error");
        $request->setMerchantNotificationUrl("https://www.merchant.com/notification");
        $request->setApmType(ApmType::SOFORT);

        $buyer = new Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;

        $secondBasketItem = new BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;

        $thirdBasketItem = new BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);
        return $request;
    }
}