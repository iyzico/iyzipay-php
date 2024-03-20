<?php

require_once('config.php');

$request = new \Iyzipay\Request\ReportingPaymentDetailRequest();
$request->setPaymentConversationId("123456789");
$request->setPaymentId('12345678');

$result = \Iyzipay\Model\ReportingPaymentDetail::create($request, Config::options());

print_r($result);
