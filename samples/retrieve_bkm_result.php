<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\RetrieveBkmRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("mockToken_1720101397775");

# make request
$bkm = \Iyzipay\Model\Bkm::retrieve($request, Config::options());

# print result
print_r($bkm);

#verify signature
$paymentId = $bkm->getPaymentId();
$paymentStatus = $bkm->getPaymentStatus();
$basketId = $bkm->getBasketId();
$conversationId = $bkm->getConversationId();
$currency = $bkm->getCurrency();
$paidPrice = $bkm->getPaidPrice();
$price = $bkm->getPrice();
$token = $bkm->getToken();
$signature = $bkm->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentId,$paymentStatus, $basketId, $conversationId, $currency, $paidPrice, $price, $token));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";