<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\CreatePaymentPostAuthRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setPaidPrice("1.2");
$request->setIp("85.34.78.112");
$request->setCurrency(\Iyzipay\Model\Currency::TL);

# make request
$postAuth = \Iyzipay\Model\PaymentPostAuth::create($request, Config::options());

# print result
print_r($postAuth);

#verify signature
$paymentId = $postAuth->getPaymentId();
$currency = $postAuth->getCurrency();
$basketId = $postAuth->getBasketId();
$conversationId = $postAuth->getConversationId();
$paidPrice = $postAuth->getPaidPrice(1);
$price = $postAuth->getPrice();
$signature = $postAuth->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentId, $currency, $basketId,  $conversationId, $paidPrice, $price));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";