<?php

require_once(dirname(__DIR__).'/IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}