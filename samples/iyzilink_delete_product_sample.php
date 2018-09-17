<?php

require_once('config.php');

$request = new \Iyzipay\Request();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$token = "AAVmmA";
$response = \Iyzipay\Model\Iyzilink\IyziLinkDeleteProduct::create($request, Config::options(),$token);

print_r($response);
