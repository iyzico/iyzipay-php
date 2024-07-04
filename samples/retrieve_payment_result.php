<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\RetrievePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setPaymentConversationId("123456789");;

# make request
$payment = \Iyzipay\Model\Payment::retrieve($request, Config::options());

# print result
print_r($payment);

#verify signature
$paymentId = $payment->getPaymentId();
$currency = $payment->getCurrency();
$basketId = $payment->getBasketId();
$conversationId = $payment->getConversationId();
$paidPrice = $payment->getPaidPrice();
$price = $payment->getPrice();
$signature = $payment->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentId, $currency, $basketId, $conversationId, $paidPrice, $price));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";