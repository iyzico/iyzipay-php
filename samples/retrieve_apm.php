<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\RetrieveApmRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");

# make request
$apmRetrieve = \Iyzipay\Model\Apm::retrieve($request, Config::options());

# print result
print_r($apmRetrieve);

#verify signature
$currency = $apmRetrieve->getCurrency();
$basketId = $apmRetrieve->getBasketId();
$conversationId = $apmRetrieve->getConversationId();
$paidPrice = $apmRetrieve->getPaidPrice();
$price = $apmRetrieve->getPrice();
$paymentId = $apmRetrieve->getPaymentId();
$redirectUrl = $apmRetrieve->getRedirectUrl();
$signature = $apmRetrieve->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($currency, $basketId, $conversationId, $paidPrice, $price, $paymentId, $redirectUrl));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";