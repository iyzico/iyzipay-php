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

    public static function create(CreateBkmInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/bkm/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
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
}
