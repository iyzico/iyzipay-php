<?php

namespace Iyzipay\Tests\Request;

use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreatePlusInstallmentPaymentRequest;
use PHPUnit\Framework\TestCase;

class PlusInstallmentCreatePaymentRequestTest extends TestCase {
    public function testShouldGetJsonObject(): void {
        $request = $this->prepareRequest();
        $jsonObject = $request->getJsonObject();

        $this->assertEquals(Locale::TR, $jsonObject['locale']);
        $this->assertEquals('123456789', $jsonObject['conversationId']);
        $this->assertEquals('1.0', $jsonObject['price']);
        $this->assertEquals('1.1', $jsonObject['paidPrice']);
        $this->assertEquals(Currency::TL, $jsonObject['currency']);
        $this->assertEquals('1', $jsonObject['installment']);
        $this->assertEquals(PaymentChannel::WEB, $jsonObject['paymentChannel']);
        $this->assertEquals(PaymentGroup::PRODUCT, $jsonObject['paymentGroup']);
        $this->assertEquals('John Doe', $jsonObject['paymentCard']['cardHolderName']);
        $this->assertEquals('5528790000000008', $jsonObject['paymentCard']['cardNumber']);
        $this->assertEquals('12', $jsonObject['paymentCard']['expireMonth']);
        $this->assertEquals('2030', $jsonObject['paymentCard']['expireYear']);
        $this->assertEquals('123', $jsonObject['paymentCard']['cvc']);
        $this->assertEquals('0', $jsonObject['paymentCard']['registerCard']);
        $this->assertEquals('BY789', $jsonObject['buyer']['id']);
        $this->assertEquals('John', $jsonObject['buyer']['name']);
        $this->assertEquals('Doe', $jsonObject['buyer']['surname']);
        $this->assertEquals('+905350000000', $jsonObject['buyer']['gsmNumber']);
        $this->assertEquals('email@email.com', $jsonObject['buyer']['email']);
        $this->assertEquals('74300864791', $jsonObject['buyer']['identityNumber']);
        $this->assertEquals('2015-10-05 12:43:35', $jsonObject['buyer']['lastLoginDate']);
        $this->assertEquals('2013-04-21 15:12:09', $jsonObject['buyer']['registrationDate']);
        $this->assertEquals('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1', $jsonObject['buyer']['registrationAddress']);
        $this->assertEquals('85.34.78.112', $jsonObject['buyer']['ip']);
        $this->assertEquals('Istanbul', $jsonObject['buyer']['city']);
        $this->assertEquals('Turkey', $jsonObject['buyer']['country']);
        $this->assertEquals('34732', $jsonObject['buyer']['zipCode']);
        $this->assertEquals('Jane Doe', $jsonObject['shippingAddress']['contactName']);
        $this->assertEquals('Istanbul', $jsonObject['shippingAddress']['city']);
        $this->assertEquals('Turkey', $jsonObject['shippingAddress']['country']);
        $this->assertEquals('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1', $jsonObject['shippingAddress']['address']);
        $this->assertEquals('34742', $jsonObject['shippingAddress']['zipCode']);
        $this->assertEquals('Jane Doe', $jsonObject['billingAddress']['contactName']);
        $this->assertEquals('Istanbul', $jsonObject['billingAddress']['city']);
        $this->assertEquals('Turkey', $jsonObject['billingAddress']['country']);
        $this->assertEquals('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1', $jsonObject['billingAddress']['address']);
        $this->assertEquals('34742', $jsonObject['billingAddress']['zipCode']);
        $this->assertEquals('BI101', $jsonObject['basketItems'][0]['id']);
        $this->assertEquals('Binocular', $jsonObject['basketItems'][0]['name']);
        $this->assertEquals('Collectibles', $jsonObject['basketItems'][0]['category1']);
        $this->assertEquals('Accessories', $jsonObject['basketItems'][0]['category2']);
        $this->assertEquals(BasketItemType::PHYSICAL, $jsonObject['basketItems'][0]['itemType']);
        $this->assertEquals('0.3', $jsonObject['basketItems'][0]['price']);
    }

    public function testShouldConvertToPkiString(): void {
        $request = $this->prepareRequest();

        $str = "[locale=tr," .
            "conversationId=123456789," .
            "price=1.0," .
            "paidPrice=1.1," .
            "installment=1," .
            "paymentChannel=WEB," .
            "basketId=B67832," .
            "paymentGroup=PRODUCT," .
            "paymentCard=[cardHolderName=John Doe," .
            "cardNumber=5528790000000008," .
            "expireYear=2030," .
            "expireMonth=12," .
            "cvc=123," .
            "registerCard=0]," .
            "buyer=[id=BY789," .
            "name=John," .
            "surname=Doe," .
            "identityNumber=74300864791," .
            "email=email@email.com," .
            "gsmNumber=+905350000000," .
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
            "itemType=PHYSICAL]]," .
            "currency=TRY]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function testShouldGetJsonString(): void {
        $request = $this->prepareRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456789",
                "price":"1.0",
                "paidPrice":"1.1",
                "installment":1,
                "paymentChannel":"WEB",
                "basketId":"B67832",
                "paymentGroup":"PRODUCT",
                "paymentCard":
                {
                    "cardHolderName":"John Doe",
                    "cardNumber":"5528790000000008",
                    "expireYear":"2030",
                    "expireMonth":"12",
                    "cvc":"123",
                    "registerCard":0
                },
                "buyer":
                {
                    "id":"BY789",
                    "name":"John",
                    "surname":"Doe",
                    "identityNumber":"74300864791",
                    "email":"email@email.com",
                    "gsmNumber":"+905350000000",
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
                    }
                ],
                "currency":"TRY"
            }';

        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest(): CreatePlusInstallmentPaymentRequest {
        $request = new CreatePlusInstallmentPaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId('123456789');
        $request->setPrice(1);
        $request->setPaidPrice(1.1);
        $request->setCurrency('TRY');
        $request->setInstallment(1);
        $request->setPaymentChannel('WEB');
        $request->setBasketId('B67832');
        $request->setPaymentGroup(PaymentGroup::PRODUCT);

        $card = new PaymentCard();
        $card->setCardHolderName('John Doe');
        $card->setCardNumber('5528790000000008');
        $card->setExpireYear('2030');
        $card->setExpireMonth('12');
        $card->setCvc('123');
        $card->setRegisterCard(0);
        $request->setPaymentCard($card);

        $buyer = new Buyer();
        $buyer->setId('BY789');
        $buyer->setName('John');
        $buyer->setSurname('Doe');
        $buyer->setIdentityNumber('74300864791');
        $buyer->setEmail('email@email.com');
        $buyer->setGsmNumber('+905350000000');
        $buyer->setRegistrationDate('2013-04-21 15:12:09');
        $buyer->setLastLoginDate('2015-10-05 12:43:35');
        $buyer->setRegistrationAddress('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1');
        $buyer->setCity('Istanbul');
        $buyer->setCountry('Turkey');
        $buyer->setZipCode('34732');
        $buyer->setIp('85.34.78.112');
        $request->setBuyer($buyer);

        $shippingAddress = new Address();
        $shippingAddress->setAddress('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1');
        $shippingAddress->setZipCode('34742');
        $shippingAddress->setContactName('Jane Doe');
        $shippingAddress->setCity('Istanbul');
        $shippingAddress->setCountry('Turkey');
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setAddress('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1');
        $billingAddress->setZipCode('34742');
        $billingAddress->setContactName('Jane Doe');
        $billingAddress->setCity('Istanbul');
        $billingAddress->setCountry('Turkey');
        $request->setBillingAddress($billingAddress);

        $firstBasketItem = new BasketItem();
        $firstBasketItem->setId('BI101');
        $firstBasketItem->setPrice(0.3);
        $firstBasketItem->setName('Binocular');
        $firstBasketItem->setCategory1('Collectibles');
        $firstBasketItem->setCategory2('Accessories');
        $firstBasketItem->setItemType(BasketItemType::PHYSICAL);
        $request->setBasketItems([$firstBasketItem]);
        return $request;
    }
}
