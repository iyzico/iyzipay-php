<?php

require_once('config.php');

$request = new \Iyzipay\Request\RetrieveLoyaltyRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setCurrency(\Iyzipay\Model\Currency::TL);

$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName("John Doe");
$paymentCard->setCardNumber("5451030000000000");
$paymentCard->setExpireMonth("12");
$paymentCard->setExpireYear("2030");
$paymentCard->setCvc("123");
$request->setPaymentCard($paymentCard);

$loyalty = \Iyzipay\Model\Loyalty::retrieve($request, Config::options());

# print result
print_r($loyalty);
