<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BkmInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBkmInitializeRequest;

class BkmInitialize extends IyzipayResource
{
    private $htmlContent;
    private $token;
    private $signature;

    public static function create(CreateBkmInitializeRequest $request, Options $options)
    {
        $uri = "/payment/bkm/initialize";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return BkmInitializeMapper::create($rawResult)->jsonDecode()->mapBkmInitialize(new BkmInitialize());
    }

    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}
