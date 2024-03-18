<?php

require_once('config.php');

function updateBlacklistedCard() {
$request = new \Iyzipay\Request\UpdateBlackListedCardRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setCardToken('G7Zzo5Y24cxwaIwC4h+jUJXtqTA=');
    $request->setCardUserKey('ew9hzoujBUJgOUer8st0ler0dOQ=');

    $blacklistedCard = \Iyzipay\Model\BlacklistedCard::update($request,Config::options());
    print_r($blacklistedCard);
}

updateBlacklistedCard();
