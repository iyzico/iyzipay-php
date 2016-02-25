<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Sample
{
    public static function options()
    {
        # create client configuration
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("base url");
        return $options;
    }
}