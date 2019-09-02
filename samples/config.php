<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-BO5UKyLACge2p5I9JEPT2PLvTmMa3M0o");
        $options->setSecretKey("sandbox-EAFrGj90cqY7UIgwZIqWLFarWvagWY3X");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}