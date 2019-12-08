<?php

require dirname(__DIR__).'/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreateProductRequest();
$request->setLocale("tr");
$request->setConversationId("1234567889");
$request->setName("KingOfProduct");
$request->setDescription("DescriptionOfProduct");

$result = \Iyzipay\Model\Subscription\SubscriptionProduct::create($request,Config::options());
print_r($result);