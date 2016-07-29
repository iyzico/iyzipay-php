<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrievePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");
$request->setPaymentConversationId("123456789");

# make request
$payment = \Iyzipay\Model\Payment::retrieve($request, Config::options());

# print result
print_r($payment);