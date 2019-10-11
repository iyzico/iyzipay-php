<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-HQGXEInpKZVlHjaQKqahs2aARSVWaEMl");
        $options->setSecretKey("sandbox-E5lmBl0VJQkMeQIxy4kDe8r17WvKi0Zz");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}