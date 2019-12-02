<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionActivateRequest();
$request->setLocale("TR");
$request->setConversationId("123456789");
$request->setSubscriptionReferenceCode("7e10bcf1-a292-41f1-b61f-19e4aa84ff40");
$result = \Iyzipay\Model\Subscription\SubscriptionActivate::update($request,Config::options());
print_r($result);