<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionDeleteProductRequest();
$request->setLocale("tr");
$request->setConversationId("123456789");
$request->setProductReferenceCode("bbab6ca0-9054-45c7-8060-57a417167738");
$result = \Iyzipay\Model\Subscription\SubscriptionProduct::delete($request,Config::options());
print_r($result);