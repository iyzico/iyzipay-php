<?php

require dirname(__DIR__) . '/config.php';

$request = new \Iyzipay\Request\Subscription\SubscriptionUpdateCustomerRequest();
$request->setLocale("tr");
$request->setConversationId("1234567789");
$request->setCustomerReferenceCode("66c238cf-faf5-4d42-bfed-642d47b74aac");
$customer = new \Iyzipay\Model\Customer();
$customer->setName("John");
$customer->setSurname("Doe");
$customer->setIdentityNumber("11111111111");
$customer->setShippingAddressContactName("John Doe");
$customer->setShippingAddressCity("Istanbul");
$customer->setShippingAddressCountry("Turkey");
$customer->setShippingAddressAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setShippingAddressZipCode("34660");
$customer->setBillingAddressContactName("John Doe");
$customer->setBillingAddressCity("Istanbul");
$customer->setBillingAddressCountry("Turkey");
$customer->setBillingAddressAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
$customer->setBillingAddressZipCode("34660");
$request->setCustomer($customer);
$result = \Iyzipay\Model\Subscription\SubscriptionCustomer::update($request,Config::options());
print_r($result);