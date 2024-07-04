<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ThreedsInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;

class ThreedsInitialize extends IyzipayResource
{
    private $htmlContent;
    private $paymentId;
    private $conversationId;
    private $signature;

    public static function create(CreatePaymentRequest $request, Options $options)
    {
        $uri = "/payment/3dsecure/initialize";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $uri, parent::getHttpHeadersV2($uri, $request, $options), $request->toJsonString());
        return ThreedsInitializeMapper::create($rawResult)->jsonDecode()->mapThreedsInitialize(new ThreedsInitialize());
    }

    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }

    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function setConversationId($conversationId)
    {
        $this->conversationId = $conversationId;
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}
