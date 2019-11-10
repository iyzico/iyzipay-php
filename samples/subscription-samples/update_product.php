<?php

require dirname(__DIR__).'/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionUpdateProductRequest();
$request->setLocale("tr");
$request->setConversationId("1234567889");
$request->setProductReferenceCode("bbab6ca0-9054-45c7-8060-57a417167738");
$request->setName("newName");
$request->setDescription("newDescription");
$result = \Iyzipay\Model\Subscription\SubscriptionProduct::update($request,Config::options());
print_r($result);