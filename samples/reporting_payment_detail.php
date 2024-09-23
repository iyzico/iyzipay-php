<?php

require_once('config.php');

$request = new \Iyzipay\Request\ReportingPaymentDetailRequest();
$request->setPaymentConversationId("123456789");
$request->setPaymentId("paymentId");

// Both paymentConversationId and paymentId are not mandatory.
// One of them is enough for the request.

$result = \Iyzipay\Model\ReportingPaymentDetail::create($request, Config::options());

print_r($result);


