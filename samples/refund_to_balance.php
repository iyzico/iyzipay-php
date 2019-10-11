<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateRefundToBalanceRequest();
$request->setPaymentId("11654127");
$request->setCallbackUrl("https://www.callback");

# make request
$refundToBalance = \Iyzipay\Model\RefundToBalance::create($request, Config::options());

# print result
print_r($refundToBalance);