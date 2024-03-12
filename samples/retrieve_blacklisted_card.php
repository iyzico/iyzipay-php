<?php

require_once('config.php');

function retrieveBlacklistedCard() {
    $request = new \Iyzipay\Request\RetrieveBlacklistedCardRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setCardNumber('5528790000000008');

    $blacklistedCard = \Iyzipay\Model\BlacklistedCard::retrieve($request, Config::options());
    print_r($blacklistedCard);
}

retrieveBlacklistedCard();
