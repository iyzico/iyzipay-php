<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCancelRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setSubscriptionReferenceCode("5560ca5b-e0b9-4270-863c-c5f702c3a110");
$result = \Iyzipay\Model\Subscription\SubscriptionCancel::cancel($request,Config::options());
print_r($result);