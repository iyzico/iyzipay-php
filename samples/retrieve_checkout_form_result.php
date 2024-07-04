<?php

require_once('config.php');
require_once('signature_verification.php');

# create request class
$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken($_POST['token']);

# make request
$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

# print result
print_r($checkoutForm);

#verify signature
$paymentStatus = $checkoutForm->getPaymentStatus();
$paymentId = $checkoutForm->getPaymentId();
$currency = $checkoutForm->getCurrency();
$basketId = $checkoutForm->getBasketId();
$conversationId = $checkoutForm->getConversationId();
$paidPrice = $checkoutForm->getPaidPrice();
$price = $checkoutForm->getPrice();
$token = $checkoutForm->getToken();
$signature = $checkoutForm->getSignature();

$calculatedSignature = calculateHmacSHA256Signature(array($paymentStatus, $paymentId, $currency, $basketId, $conversationId, $paidPrice, $price, $token));
$verified = $signature == $calculatedSignature;
echo "Signature verified: $verified";