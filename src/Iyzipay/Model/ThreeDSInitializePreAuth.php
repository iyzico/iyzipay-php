<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreeDSInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateThreeDSInitializeRequest;

class ThreeDSInitializePreAuth extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateThreeDSInitializeRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/iyzipos/initialize3ds/preauth/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ThreeDSInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapThreeDSInitializePreAuth(new ThreeDSInitializePreAuth());
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