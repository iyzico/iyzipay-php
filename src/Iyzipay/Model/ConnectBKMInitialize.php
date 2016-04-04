<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ConnectBKMInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectBKMInitializeRequest;

class ConnectBKMInitialize extends IyzipayResource
{
    private $htmlContent;
    private $token;

    public static function create(CreateConnectBKMInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyziconnect/bkm/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectBKMInitializeMapper::create($rawResult)->jsonDecode()->mapConnectBKMInitialize(new ConnectBKMInitialize());
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