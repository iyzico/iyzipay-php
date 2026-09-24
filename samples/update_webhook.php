<?php

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\UpdateWebhookRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setWebhookUrl("https://magaza.com/rest/V1/iyzico/webhook/aB3xK9");

# make request
$webhook = \Iyzipay\Model\Webhook::update($request, Config::options());

# print result
print_r($webhook);
