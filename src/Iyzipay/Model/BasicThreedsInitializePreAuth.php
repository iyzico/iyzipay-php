<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BasicThreedsInitializePreAuthMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicThreedsInitializePreAuth extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/initialize/preauth/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicThreedsInitializePreAuthMapper::create($rawResult)->jsonDecode()->mapBasicThreedsInitializePreAuth(new BasicThreedsInitializePreAuth());
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