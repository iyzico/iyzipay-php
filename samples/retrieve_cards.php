<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveCardListRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setCardUserKey("card user key");

# make request
$cardList = \Iyzipay\Model\CardList::retrieve($request, Config::options());

# print result
print_r($cardList);