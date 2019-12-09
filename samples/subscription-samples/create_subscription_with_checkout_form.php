<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest();
$request->setConversationId("123456789");
$request->setLocale("tr");
$request->setPricingPlanReferenceCode("ffed3cb1-1cf6-476f-9a0c-ae2a89e2cc1d");
$request->setSubscriptionInitialStatus("ACTIVE");
$request->setCallbackUrl("https://callbackurl.com");
$customer = new \Iyzipay\Model\Customer();
$customer->setName("John");
$customer->setSurname("Doe");
$customer->setGsmNumber("+905555555555");
$customer->setEmail("johndoe@iyzico.com");
$customer->setIdentityNumber("11111111111");
$customer->setShippingContactName("John Doe");
$customer->setShippingCity("Istanbul");
$customer->setShippingCountry("Turkey");
$customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setShippingZipCode("34660");
$customer->setBillingContactName("John Doe");
$customer->setBillingCity("Istanbul");
$customer->setBillingCountry("Turkey");
$customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setBillingZipCode("34660");
$request->setCustomer($customer);
$result = \Iyzipay\Model\Subscription\SubscriptionCreateCheckoutForm::create($request,Config::options());
print_r($result);