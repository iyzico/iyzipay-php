<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class IyziupFormInitializeResource extends IyzipayResource
{
    private $token;
    private $content;
    private $tokenExpireTime;

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getTokenExpireTime()
    {
        return $this->tokenExpireTime;
    }

    public function setTokenExpireTime($tokenExpireTime)
    {
        $this->tokenExpireTime = $tokenExpireTime;
    }
}