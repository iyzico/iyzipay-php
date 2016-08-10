<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\DeleteCardRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setCardToken("card token");
$request->setCardUserKey("card user key");

# make request
$card = \Iyzipay\Model\Card::delete($request, Config::options());

# print result
print_r($card);