<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveBkmRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("token");

# make request
$bkm = \Iyzipay\Model\Bkm::retrieve($request, Config::options());

# print result
print_r($bkm);