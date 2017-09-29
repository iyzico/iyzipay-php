<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveIyziupFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("f2e140d2-ba4e-4cde-aa24-ebca72360920");

# make request
$iyziupForm = \Iyzipay\Model\IyziupForm::retrieve($request, Config::options());

# print result
print_r($iyziupForm);