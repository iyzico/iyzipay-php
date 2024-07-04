<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\RetrievePayWithIyzicoRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("f2a29cc5-90e4-4f6e-b05b-4e1e6902f003");

# make request
$payWithIyzico = \Iyzipay\Model\PayWithIyzico::retrieve($request, Config::options());

# print result
print_r($payWithIyzico);

#verify signature
$paymentStatus = $payWithIyzico->getPaymentStatus();
$paymentId = $payWithIyzico->getPaymentId();
$currency = $payWithIyzico->getCurrency();
$basketId = $payWithIyzico->getBasketId();
$conversationId = $payWithIyzico->getConversationId();
$paidPrice = $payWithIyzico->getPaidPrice();
$price = $payWithIyzico->getPrice();
$signature = $payWithIyzico->getSignature();
$token = $payWithIyzico->getToken();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentStatus, $paymentId, $currency, $basketId, $conversationId, $paidPrice, $price, $token));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";