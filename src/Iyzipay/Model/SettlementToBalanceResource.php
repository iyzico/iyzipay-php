<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class SettlementToBalanceResource extends IyzipayResource
{
    private $url;
    private $token;
    private $isSettingsAllTime;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getIsSettingsAllTime()
    {
        return $this->isSettingsAllTime;
    }

    public function setIsSettingsAllTime($isSettingsAllTime)
    {
        $this->isSettingsAllTime = $isSettingsAllTime;
    }
}