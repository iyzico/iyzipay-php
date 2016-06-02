<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\BasicThreedsInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBasicPaymentRequest;

class BasicThreedsInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateBasicPaymentRequest $request, Options $options)
    {
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . "/payment/3dsecure/initialize/basic", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BasicThreedsInitializeMapper::create($rawResult)->jsonDecode()->mapBasicThreedsInitialize(new BasicThreedsInitialize());
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