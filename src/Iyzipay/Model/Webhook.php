<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\WebhookMapper;
use Iyzipay\Options;
use Iyzipay\Request\UpdateWebhookRequest;

class Webhook extends IyzipayResource
{
    private $merchantNotificationUpdateStatus;

    public static function update(UpdateWebhookRequest $request, Options $options)
    {
        $url = "/payment/notification/update";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return WebhookMapper::create($rawResult)->jsonDecode()->mapWebhook(new Webhook());
    }

    public function getMerchantNotificationUpdateStatus()
    {
        return $this->merchantNotificationUpdateStatus;
    }

    public function setMerchantNotificationUpdateStatus($merchantNotificationUpdateStatus)
    {
        $this->merchantNotificationUpdateStatus = $merchantNotificationUpdateStatus;
    }
}
