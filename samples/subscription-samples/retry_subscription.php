<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionRetryRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setReferenceCode("504de1a8-8588-485e-9f8d-9bd9f3cb52f2");
$result = \Iyzipay\Model\Subscription\SubscriptionRetry::update($request,Config::options());
print_r($result);