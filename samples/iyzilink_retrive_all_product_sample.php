<?php

require_once('config.php');

$request = new \Iyzipay\Request\Iyzilink\IyziLinkRetriveAllPagininRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId(uniqid());
$request->setPage(1);
$request->setCount(2);
$response = \Iyzipay\Model\Iyzilink\IyziLinkRetriveAllProduct::create($request, Config::options());

print_r($response);
