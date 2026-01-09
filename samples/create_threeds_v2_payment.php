<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\CreateThreedsV2PaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("25146302");
$request->setPaidPrice("1.2");
$request->setBasketId('B67832');
$request->setCurrency(\Iyzipay\Model\Currency::TL);

# make request
$threedsV2Payment = \Iyzipay\Model\ThreedsV2Payment::create($request, Config::options());

# print result
print_r($threedsV2Payment);

#verify signature
$paymentId = $threedsV2Payment->getPaymentId();
$currency = $threedsV2Payment->getCurrency();
$basketId = $threedsV2Payment->getBasketId();
$conversationId = $threedsV2Payment->getConversationId();
$paidPrice = $threedsV2Payment->getPaidPrice();
$price = $threedsV2Payment->getPrice();
$signature = $threedsV2Payment->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentId, $currency, $basketId, $conversationId, $paidPrice, $price));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";