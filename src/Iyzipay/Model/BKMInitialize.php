<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BKMInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBKMInitializeRequest;

class BKMInitialize extends IyzipayResource
{
    private $htmlContent;
    private $token;

    public static function create(CreateBKMInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/bkm/initialize/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BKMInitializeMapper::create($rawResult)->jsonDecode()->mapBKMInitialize(new BKMInitialize());
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