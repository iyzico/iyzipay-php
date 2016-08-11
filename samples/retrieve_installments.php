<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setBinNumber("554960");
$request->setPrice("100");

# make request
$installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, Config::options());

# print result
print_r($installmentInfo);