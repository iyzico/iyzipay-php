<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ConnectThreeDSInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;

class ConnectThreeDSInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateConnectThreeDSInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyziconnect/initialize3ds", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectThreeDSInitializeMapper::create($rawResult)->jsonDecode()->mapConnectThreeDSInitialize(new ConnectThreeDSInitialize());
    }

    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }
}