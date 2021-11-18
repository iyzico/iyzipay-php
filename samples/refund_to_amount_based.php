<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateRefundToAmountBasedRequest();
$request->setPaymentId("12705464");
$request->setPrice("5.0");
$request->setIp("127.0.0.1");
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");

# make request
$refundToAmountBased = \Iyzipay\Model\RefundToAmountBased::create($request, Config::options());

# print result
print_r($refundToAmountBased);