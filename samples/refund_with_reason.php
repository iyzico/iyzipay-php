<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateRefundRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentTransactionId("2");
$request->setPrice("0.2");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setIp("85.34.78.112");
$request->setReason("other");
$request->setDescription("customer requested for default sample");

# make request
$refund = \Iyzipay\Model\Refund::create($request, Config::options());

# print result
print_r($refund);