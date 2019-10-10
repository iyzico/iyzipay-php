<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("IJTgyxLBidM8Hj2G8c4MVUdrIbgh6ZVz");
        $options->setSecretKey("IdSUuKN4lumCl3QU17NAiJ8386Zms4hb");
        $options->setBaseUrl("https://api.iyzipay.com");
        return $options;
    }
}