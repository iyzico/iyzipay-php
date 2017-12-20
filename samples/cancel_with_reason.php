<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateCancelRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setIp("85.34.78.112");
$request->setReason(\Iyzipay\Model\RefundReason::OTHER);
$request->setDescription("customer requested for default sample");

# make request
$cancel = \Iyzipay\Model\Cancel::create($request, Config::options());

# print result
print_r($cancel);