<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken($_POST['token']);

# make request
$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

# print result
print_r($checkoutForm);