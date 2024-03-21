<?php

require_once('config.php');

function createPlusInstallmentPayment(): void {
    $request = new \Iyzipay\Request\CreatePlusInstallmentPaymentRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setPrice(1);
    $request->setPaidPrice(1.1);
    $request->setCurrency('TRY');
    $request->setInstallment(1);
    $request->setPaymentChannel(Iyzipay\Model\PaymentChannel::WEB);
    $request->setBasketId('B67832');
    $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

    $card = new \Iyzipay\Model\PaymentCard();
    $card->setCardHolderName('John Doe');
    $card->setCardNumber('5528790000000008');
    $card->setExpireYear('2030');
    $card->setExpireMonth('12');
    $card->setCvc('123');
    $card->setRegisterCard(0);
    $request->setPaymentCard($card);

    $buyer = new \Iyzipay\Model\Buyer();
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

    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setAddress('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1');
    $shippingAddress->setZipCode('34742');
    $shippingAddress->setContactName('Jane Doe');
    $shippingAddress->setCity('Istanbul');
    $shippingAddress->setCountry('Turkey');
    $request->setShippingAddress($shippingAddress);

    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setAddress('Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1');
    $billingAddress->setZipCode('34742');
    $billingAddress->setContactName('Jane Doe');
    $billingAddress->setCity('Istanbul');
    $billingAddress->setCountry('Turkey');
    $request->setBillingAddress($billingAddress);

    $firstBasketItem = new Iyzipay\Model\BasketItem();
    $firstBasketItem->setId('BI101');
    $firstBasketItem->setPrice(0.3);
    $firstBasketItem->setName('Binocular');
    $firstBasketItem->setCategory1('Collectibles');
    $firstBasketItem->setCategory2('Accessories');
    $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);

    $secondBasketItem = new Iyzipay\Model\BasketItem();
    $secondBasketItem->setId('BI101');
    $secondBasketItem->setPrice(0.5);
    $secondBasketItem->setName('Binocular');
    $secondBasketItem->setCategory1('Collectibles');
    $secondBasketItem->setCategory2('Accessories');
    $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);

    $thirdBasketItem = new Iyzipay\Model\BasketItem();
    $thirdBasketItem->setId('BI101');
    $thirdBasketItem->setPrice(0.2);
    $thirdBasketItem->setName('Binocular');
    $thirdBasketItem->setCategory1('Collectibles');
    $thirdBasketItem->setCategory2('Accessories');
    $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    $request->setBasketItems([$firstBasketItem, $secondBasketItem, $thirdBasketItem]);

    $plusInstallmentPayment = \Iyzipay\Model\PlusInstallmentPayment::create($request, Config::options());
    print_r($plusInstallmentPayment);
}

createPlusInstallmentPayment();
