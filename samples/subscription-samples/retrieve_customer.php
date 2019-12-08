<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest();
$request->setCustomerReferenceCode("66c238cf-faf5-4d42-bfed-642d47b74aac");
$result = \Iyzipay\Model\Subscription\SubscriptionCustomer::retrieve($request,Config::options());
print_r($result);