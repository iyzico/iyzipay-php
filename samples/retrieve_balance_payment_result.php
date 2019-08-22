<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveBalancePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("token");

# make request
$balancePayment = \Iyzipay\Model\BalancePayment::retrieve($request, Config::options());

# print result
print_r($balancePayment);