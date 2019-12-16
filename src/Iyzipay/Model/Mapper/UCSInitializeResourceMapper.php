<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\UCSInitializeResource;

class UCSInitializeResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new UCSInitializeMapper($rawResult);
    }

    public function mapUCSInitializeResourceFrom(UCSInitializeResource $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->ucsToken)) {
            $initialize->setUcsToken($jsonObject->ucsToken);
        }
        if (isset($jsonObject->buyerProtectedConsumer)) {
            $initialize->setBuyerProtectedConsumer($jsonObject->buyerProtectedConsumer);
        }
        if (isset($jsonObject->buyerProtectedMerchant)) {
            $initialize->setBuyerProtectedMerchant($jsonObject->buyerProtectedMerchant);
        }
        if (isset($jsonObject->gsmNumber)) {
            $initialize->setGsmNumber($jsonObject->gsmNumber);
        }
        if (isset($jsonObject->maskedGsmNumber)) {
            $initialize->setMaskedGsmNumber($jsonObject->maskedGsmNumber);
        }
        if (isset($jsonObject->merchantName)) {
            $initialize->setMerchantName($jsonObject->merchantName);
        }
        if (isset($jsonObject->script)) {
            $initialize->setScript($jsonObject->script);
        }
        if (isset($jsonObject->scriptType)) {
            $initialize->setScriptType($jsonObject->scriptType);
        }
        return $initialize;
    }

    public function mapUCSInitializeResource(UCSInitializeResource $initialize)
    {
        return $this->mapUCSInitializeResourceFrom($initialize, $this->jsonObject);
    }
}