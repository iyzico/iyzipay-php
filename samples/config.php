<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("");
        $options->setSecretKey("");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}