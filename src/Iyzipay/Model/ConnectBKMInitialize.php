<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\ConnectBKMInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectBKMInitializeRequest;

class ConnectBKMInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateConnectBKMInitializeRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/bkm/initialize", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectBKMInitializeMapper::create()->mapConnectBKMInitialize(new ConnectBKMInitialize(), JsonBuilder::jsonDecode($rawResult));
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