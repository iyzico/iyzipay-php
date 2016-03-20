<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreeDSInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreeDSInitializeRequest;

class ThreeDSInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateThreeDSInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/initialize3ds/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSInitializeMapper::create($rawResult)->jsonDecode()->mapThreeDSInitialize(new ThreeDSInitialize());
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