<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ConnectThreeDSInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateConnectThreeDSInitializeRequest;

class ConnectThreeDSInitializePreAuth extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateConnectThreeDSInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyziconnect/initialize3ds/preauth", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectThreeDSInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapConnectThreeDSInitializePreAuth(new ConnectThreeDSInitializePreAuth());
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