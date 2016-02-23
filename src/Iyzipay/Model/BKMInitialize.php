<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\JsonBuilder;
use Iyzipay\Model\Mapper\BKMInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateBKMInitializeRequest;

class BKMInitialize extends IyzipayResource
{
    private $htmlContent;

    public static function create(CreateBKMInitializeRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/bkm/initialize/ecom", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return BKMInitializeMapper::create()->mapBKMInitialize(new BKMInitialize(), JsonBuilder::jsonDecode($rawResult));
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