<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest();
$request->setConversationId("123456789");
$request->setLocale("tr");
$request->setPricingPlanReferenceCode("eb5cc6b4-a441-484c-99f2-ea7c1755ecd3");
$request->setSubscriptionInitialStatus("ACTIVE");
$request->setCustomerReferenceCode("1aa8d2ce-8209-4666-8bf5-b818e851c590");
$result = \Iyzipay\Model\Subscription\SubscriptionCreateWithCustomer::create($request,Config::options());
print_r($result);