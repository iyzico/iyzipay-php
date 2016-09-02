<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreatePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPrice("1");
$request->setPaidPrice("1.2");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setInstallment(1);
$request->setBasketId("B67832");
$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName("John Doe");
$paymentCard->setCardNumber("5528790000000008");
$paymentCard->setExpireMonth("12");
$paymentCard->setExpireYear("2030");
$paymentCard->setCvc("123");
$paymentCard->setRegisterCard(0);
$request->setPaymentCard($paymentCard);

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId("BY789");
$buyer->setName("John");
$buyer->setSurname("Doe");
$buyer->setGsmNumber("+905350000000");
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

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("Jane Doe");
$shippingAddress->setCity("Istanbul");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("Jane Doe");
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("BI101");
$firstBasketItem->setName("Binocular");
$firstBasketItem->setCategory1("Collectibles");
$firstBasketItem->setCategory2("Accessories");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice("0.3");
$firstBasketItem->setSubMerchantKey("sub merchant key");
$firstBasketItem->setSubMerchantPrice("0.27");
$basketItems[0] = $firstBasketItem;

$secondBasketItem = new \Iyzipay\Model\BasketItem();
$secondBasketItem->setId("BI102");
$secondBasketItem->setName("Game code");
$secondBasketItem->setCategory1("Game");
$secondBasketItem->setCategory2("Online Game Items");
$secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
$secondBasketItem->setPrice("0.5");
$secondBasketItem->setSubMerchantKey("sub merchant key");
$secondBasketItem->setSubMerchantPrice("0.42");
$basketItems[1] = $secondBasketItem;

$thirdBasketItem = new \Iyzipay\Model\BasketItem();
$thirdBasketItem->setId("BI103");
$thirdBasketItem->setName("Usb");
$thirdBasketItem->setCategory1("Electronics");
$thirdBasketItem->setCategory2("Usb / Cable");
$thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$thirdBasketItem->setPrice("0.2");
$thirdBasketItem->setSubMerchantKey("sub merchant key");
$thirdBasketItem->setSubMerchantPrice("0.18");
$basketItems[2] = $thirdBasketItem;
$request->setBasketItems($basketItems);

# make request
$payment = \Iyzipay\Model\Payment::create($request, Config::options());

# print result
print_r($payment);