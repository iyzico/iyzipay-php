<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setConversationData("conversation data");

# make request
$threedsPayment = \Iyzipay\Model\ThreedsPayment::create($request, Config::options());

# print result
print_r($threedsPayment);

#verify signature
$paymentId = $threedsPayment->getPaymentId();
$currency = $threedsPayment->getCurrency();
$basketId = $threedsPayment->getBasketId();
$conversationId = $threedsPayment->getConversationId();
$paidPrice = $threedsPayment->getPaidPrice();
$price = $threedsPayment->getPrice();
$signature = $threedsPayment->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentId, $currency, $basketId, $conversationId, $paidPrice, $price));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";