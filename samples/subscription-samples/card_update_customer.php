<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCardUpdateRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setCustomerReferenceCode("7ad4cc50-c96c-45c6-a3f3-5f1db261e511");
$request->setCallBackUrl("https://www.callbackurl.com");
$result = \Iyzipay\Model\Subscription\SubscriptionCardUpdate::update($request,Config::options());
print_r($result);