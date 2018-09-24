<?php

require_once('config.php');

$request = new \Iyzipay\Request\PagininRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPage(1);
$request->setCount(2);
$response = \Iyzipay\Model\Iyzilink\IyziLinkRetrieveAllProduct::create($request, Config::options());

print_r($response);
