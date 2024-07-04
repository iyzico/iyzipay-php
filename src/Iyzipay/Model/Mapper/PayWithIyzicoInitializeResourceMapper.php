<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayWithIyzicoInitializeResource;

class PayWithIyzicoInitializeResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayWithIyzicoInitializeMapper($rawResult);
    }

    public function mapPayWithIyzicoInitializeResourceFrom(PayWithIyzicoInitializeResource $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->token)) {
            $initialize->setToken($jsonObject->token);
        }
        if (isset($jsonObject->payWithIyzicoContent)) {
            $initialize->setPayWithIyzicoContent($jsonObject->payWithIyzicoContent);
        }
        if (isset($jsonObject->tokenExpireTime)) {
            $initialize->setTokenExpireTime($jsonObject->tokenExpireTime);
        }
        if (isset($jsonObject->payWithIyzicoPageUrl)) {
            $initialize->setPaymentPageUrl($jsonObject->payWithIyzicoPageUrl);
        }
        if (isset($jsonObject->signature)) {
            $initialize->setSignature($jsonObject->signature);
        }
        return $initialize;
    }

    public function mapPayWithIyzicoInitializeResource(PayWithIyzicoInitializeResource $initialize)
    {
        return $this->mapPayWithIyzicoInitializeResourceFrom($initialize, $this->jsonObject);
    }
}