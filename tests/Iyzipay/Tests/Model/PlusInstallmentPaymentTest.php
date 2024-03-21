<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Model\PlusInstallmentPayment;
use Iyzipay\Request\CreatePlusInstallmentPaymentRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class PlusInstallmentPaymentTest extends IyzipayResourceTestCase {
    public function testShouldCreatePlusInstallmentPayment(): void {
        $this->expectHttpPost();

        $request = new CreatePlusInstallmentPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice(1);
        $request->setPaidPrice(1.1);
        $request->setCurrency('TRY');
        $request->setInstallment(1);
        $request->setPaymentChannel(PaymentChannel::WEB);
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
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);

        $secondBasketItem = new BasketItem();
        $secondBasketItem->setId('BI101');
        $secondBasketItem->setPrice(0.5);
        $secondBasketItem->setName('Binocular');
        $secondBasketItem->setCategory1('Collectibles');
        $secondBasketItem->setCategory2('Accessories');
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);

        $thirdBasketItem = new BasketItem();
        $thirdBasketItem->setId('BI101');
        $thirdBasketItem->setPrice(0.2);
        $thirdBasketItem->setName('Binocular');
        $thirdBasketItem->setCategory1('Collectibles');
        $thirdBasketItem->setCategory2('Accessories');
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $request->setBasketItems([$firstBasketItem, $secondBasketItem, $thirdBasketItem]);

        $payment = PlusInstallmentPayment::create($request, $this->options);
        $this->verifyResource($payment);
    }
}
