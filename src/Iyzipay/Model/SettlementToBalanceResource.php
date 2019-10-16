<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class SettlementToBalanceResource extends IyzipayResource
{
    private $url;
    private $token;
    private $settingsAllTime;

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

    public function getSettingsAllTime()
    {
        return $this->settingsAllTime;
    }

    public function setSettingsAllTime($settingsAllTime)
    {
        $this->settingsAllTime = $settingsAllTime;
    }
}