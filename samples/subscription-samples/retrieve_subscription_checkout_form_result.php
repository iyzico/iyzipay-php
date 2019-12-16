<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\RetrieveSubscriptionCreateCheckoutFormRequest();
$request->setCheckoutFormToken("817ff890-424c-4e15-b190-d178834750cc");
$result = \Iyzipay\Model\Subscription\RetrieveSubscriptionCheckoutForm::retrieve($request,Config::options());
print_r($result);