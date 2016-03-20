<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\BKMAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveBKMAuthRequest;

class BKMAuth extends Payment
{
    private $token;
    private $callbackUrl;

    public static function retrieve(RetrieveBKMAuthRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/bkm/auth/ecom/detail", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BKMAuthMapper::create($rawResult)->jsonDecode()->mapBKMAuth(new BKMAuth());
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }
}