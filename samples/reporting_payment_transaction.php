<?php

require_once('config.php');

$request = new \Iyzipay\Request\ReportingPaymentTransactionRequest();
$request->setconversationId("123456789");
$request->setTransactionDate("2018-10-10");
$request->setPage("1");

$result = \Iyzipay\Model\ReportingPaymentTransaction::create($request, Config::options());

print_r($result);


