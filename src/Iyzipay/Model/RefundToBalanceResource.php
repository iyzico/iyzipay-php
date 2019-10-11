<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class RefundToBalanceResource extends IyzipayResource
{
    private $token;
    private $url;

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}