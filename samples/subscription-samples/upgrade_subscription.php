<?php

require dirname(__DIR__) . '/config.php';


$request = new \Iyzipay\Request\Subscription\SubscriptionUpgradeRequest();
$request->setLocale("TR");
$request->setConversationId("123123123");
$request->setSubscriptionReferenceCode("85eaa655-c3fd-4053-9e9b-dacc9e201c5f");
$request->setNewPricingPlanReferenceCode("5308630d-fb0a-453f-b30a-5afa719d5191");
$request->setUpgradePeriod("NOW");
$request->setUseTrial(true);
$request->setResetRecurrenceCount(true);
$result = \Iyzipay\Model\Subscription\SubscriptionUpgrade::update($request,Config::options());
print_r($result);