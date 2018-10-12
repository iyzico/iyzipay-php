<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\SubMerchantPaymentItemUpdate;

class SubMerchantPaymentItemResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new SubMerchantPaymentItemResourceMapper($rawResult);
    }

    public function mapSubMerchantPaymentItemResourceFrom(SubMerchantPaymentItemUpdate $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->subMerchantKey)) {
            $create->setSubMerchantKey($jsonObject->subMerchantKey);
        }

        if (isset($jsonObject->paymentTransactionId)) {
            $create->setPaymentTransactionId($jsonObject->paymentTransactionId);
        }

        if (isset($jsonObject->subMerchantPrice)) {
            $create->setSubMerchantPrice($jsonObject->subMerchantPrice);
        }

        return $create;
    }

    public function mapSubMerchantPaymentItemResource(SubMerchantPaymentItemUpdate $create)
    {
        return $this->mapSubMerchantPaymentItemResourceFrom($create, $this->jsonObject);
    }
}