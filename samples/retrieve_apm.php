<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveApmRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentId("1");

# make request
$apmRetrieve = \Iyzipay\Model\Apm::retrieve($request, Config::options());

# print result
print_r($apmRetrieve);