<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\RefundToBalanceResource;

class RefundToBalanceResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new RefundToBalanceResourceMapper($rawResult);
    }

    public function mapRefundToBalanceResourceFrom(RefundToBalanceResource $refundToBalanceResource, $jsonObject)
    {
        parent::mapResourceFrom($refundToBalanceResource, $jsonObject);

        if (isset($jsonObject->token)) {
            $refundToBalanceResource->setToken($jsonObject->token);
        }
        if (isset($jsonObject->url)) {
            $refundToBalanceResource->setUrl($jsonObject->url);
        }

        return $refundToBalanceResource;
    }

    public function mapRefundToBalanceResource(RefundToBalanceResource $refundToBalanceResource)
    {
        return $this->mapRefundToBalanceResourceFrom($refundToBalanceResource, $this->jsonObject);
    }
}