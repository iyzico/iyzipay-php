<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectThreeDSInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;

class ConnectThreeDSInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateConnectThreeDSInitializeRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/initialize3ds", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectThreeDSInitializeMapper::create()->mapConnectThreeDSInitialize(new ConnectThreeDSInitialize(), JsonBuilder::jsonDecode($rawResult));
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