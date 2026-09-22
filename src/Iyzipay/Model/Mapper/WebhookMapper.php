<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Webhook;

class WebhookMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new WebhookMapper($rawResult);
    }

    public function mapWebhookFrom(Webhook $webhook, $jsonObject)
    {
        parent::mapResourceFrom($webhook, $jsonObject);

        if (isset($jsonObject->merchantNotificationUpdateStatus)) {
            $webhook->setMerchantNotificationUpdateStatus($jsonObject->merchantNotificationUpdateStatus);
        }
        return $webhook;
    }

    public function mapWebhook(Webhook $webhook)
    {
        return $this->mapWebhookFrom($webhook, $this->jsonObject);
    }
}
