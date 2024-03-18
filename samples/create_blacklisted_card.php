<?php

require_once('config.php');

function createBlacklistedCard() {
    $request = new \Iyzipay\Request\CreateBlackListedCardRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setCardToken('G7Zzo5Y24cxwaIwC4h+jUJXtqTA=');
    $request->setCardUserKey('ew9hzoujBUJgOUer8st0ler0dOQ=');

    $blacklistedCard = \Iyzipay\Model\BlacklistedCard::create($request, Config::options());
    print_r($blacklistedCard);
}

createBlacklistedCard();
