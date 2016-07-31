<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateApprovalRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPaymentTransactionId("1");

# make request
$disapproval = \Iyzipay\Model\Disapproval::create($request, Config::options());

# print result
print_r($disapproval);