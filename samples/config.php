<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("Dy9i7dTkVkGfXWZMW0sVYvThtazz5XMP");
        $options->setSecretKey("EpJUroIo26vWwaKwbzytr4q5aPgwSoPP");
        $options->setBaseUrl("https://api.iyzipay.com");
        return $options;
    }
}