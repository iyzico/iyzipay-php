<?php

namespace Iyzipay;

class Curl
{
    public function exec($url, $options)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        return curl_exec($ch);
    }
}