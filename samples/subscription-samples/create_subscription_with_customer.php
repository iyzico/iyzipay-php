<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setPricingPlanReferenceCode("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d");
$request->setCustomerReferenceCode("7ad4cc50-c96c-45c6-a3f3-5f1db261e511");
$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName("John Doe");
$paymentCard->setCardNumber("4603450000000000");
$paymentCard->setExpireMonth("12");
$paymentCard->setExpireYear("2030");
$paymentCard->setCvc("123");
$request->setPaymentCard($paymentCard);
$result = \Iyzipay\Model\Subscription\SubscriptionCreateWithCustomer::create($request,Config::options());
print_r($result);