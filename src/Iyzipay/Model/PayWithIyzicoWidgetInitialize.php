<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\PayWithIyzicoWidgetInitializeMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreatePayWithIyzicoWidgetInitializeRequest;

class PayWithIyzicoWidgetInitialize extends IyzipayResource
{
    private $widgetToken;
    private $widgetContent;

    public static function create(CreatePayWithIyzicoWidgetInitializeRequest $request, Options $options)
    {
        $url = "/v1/pay-with-iyzico/widget/init";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return PayWithIyzicoWidgetInitializeMapper::create($rawResult)->jsonDecode()->mapPayWithIyzicoWidgetInitialize(new PayWithIyzicoWidgetInitialize());
    }

    public function getWidgetToken()
    {
        return $this->widgetToken;
    }

    public function setWidgetToken($widgetToken)
    {
        $this->widgetToken = $widgetToken;
    }

    public function getWidgetContent()
    {
        return $this->widgetContent;
    }

    public function setWidgetContent($widgetContent)
    {
        $this->widgetContent = $widgetContent;
    }
}
