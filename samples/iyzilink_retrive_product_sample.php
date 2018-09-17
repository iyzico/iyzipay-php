<?php

require_once('config.php');

$request = new \Iyzipay\Request();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$response = \Iyzipay\Model\Iyzilink\IyziLinkRetriveProduct::create($request, Config::options(),'AAVZSw');

print_r($response);
