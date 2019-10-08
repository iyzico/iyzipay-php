<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateRefundToBalanceRequest();
$request->setPaymentId("123456");
$request->setCallbackUrl("https://www.google.com");

# make request
$refundToBalance = \Iyzipay\Model\RefundToBalance::create($request, Config::options());

echo '<pre>';
# print result
print_r($refundToBalance);