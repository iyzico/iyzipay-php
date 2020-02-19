<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCardUpdateWithSubscriptionReferenceCodeRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setSubscriptionReferenceCode("7ad4cc50-c96c-45c6-a3f3-5f1db261e511");
$request->setCallBackUrl("https://www.callbackurl.com");
$result = \Iyzipay\Model\Subscription\SubscriptionCardUpdate::updateWithSubscriptionReferenceCode($request,Config::options());
print_r($result);