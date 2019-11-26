<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class UCSInitializeResource extends IyzipayResource
{
    private $ucsToken;
    private $buyerProtectedConsumer;
    private $buyerProtectedMerchant;
    private $gsmNumber;
    private $maskedGsmNumber;
    private $merchantName;
    private $script;
    private $scriptType;

    public function getUcsToken()
    {
        return $this->ucsToken;
    }
    public function setUcsToken($ucsToken)
    {
        $this->ucsToken = $ucsToken;
    }

    public function getBuyerProtectedConsumer()
    {
        return $this->buyerProtectedConsumer;
    }
    public function setBuyerProtectedConsumer($buyerProtectedConsumer)
    {
        $this->buyerProtectedConsumer = $buyerProtectedConsumer;
    }

    public function setBuyerProtectedMerchant($buyerProtectedMerchant)
    {
        $this->buyerProtectedMerchant = $buyerProtectedMerchant;
    }
    public function getBuyerProtectedMerchant()
    {
        return $this->buyerProtectedMerchant;
    }

    public function setGsmNumber($gsmNumber)
    {
        $this->gsmNumber = $gsmNumber;
    }
    public function getGsmNumber()
    {
        return $this->gsmNumber;
    }

    public function setMaskedGsmNumber($maskedGsmNumber)
    {
        $this->maskedGsmNumber = $maskedGsmNumber;
    }
    public function getMaskedGsmNumber()
    {
        return $this->maskedGsmNumber;
    }

    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
    }
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    public function setScript($script)
    {
        $this->script = $script;
    }
    public function getScript()
    {
        return $this->script;
    }

    public function setScriptType($scriptType)
    {
        $this->scriptType = $scriptType;
    }
    public function getScriptType()
    {
        return $this->scriptType;
    }
}