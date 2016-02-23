<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Sample
{
    public static function options()
    {
        # create client configuration
        $options = new \Iyzipay\Options();
        $options->setApiKey("mrI3mIMuNwGiIxanQslyJBRYa8nYrCU5");
        $options->setSecretKey("9lkVluNHBABPw0LIvyn50oYZcrSJ8oNo");
        $options->setBaseUrl("https://stg.iyzipay.com");
        return $options;
    }
}
