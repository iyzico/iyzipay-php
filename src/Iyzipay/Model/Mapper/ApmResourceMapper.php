<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ApmResource;

class ApmResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ApmResourceMapper($rawResult);
    }

    public function mapApmResourceFrom(ApmResource $apmResource, $jsonObject)
    {
        parent::mapResourceFrom($apmResource, $jsonObject);

        if (isset($jsonObject->redirectUrl)) {
            $apmResource->setRedirectUrl($jsonObject->redirectUrl);
        }
        if (isset($jsonObject->price)) {
            $apmResource->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->paidPrice)) {
            $apmResource->setPaidPrice($jsonObject->paidPrice);
        }
        if (isset($jsonObject->paymentId)) {
            $apmResource->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->merchantCommissionRate)) {
            $apmResource->setMerchantCommissionRate($jsonObject->merchantCommissionRate);
        }
        if (isset($jsonObject->merchantCommissionRateAmount)) {
            $apmResource->setMerchantCommissionRateAmount($jsonObject->merchantCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionRateAmount)) {
            $apmResource->setIyziCommissionRateAmount($jsonObject->iyziCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionFee)) {
            $apmResource->setIyziCommissionFee($jsonObject->iyziCommissionFee);
        }
        if (isset($jsonObject->basketId)) {
            $apmResource->setBasketId($jsonObject->basketId);
        }
        if (isset($jsonObject->currency)) {
            $apmResource->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->itemTransactions)) {
            $apmResource->setPaymentItems(PaymentItemMapper::create()->mapPaymentItems($jsonObject->itemTransactions));
        }
        if (isset($jsonObject->phase)) {
            $apmResource->setPhase($jsonObject->phase);
        }
        if (isset($jsonObject->accountHolderName)) {
            $apmResource->setAccountHolderName($jsonObject->accountHolderName);
        }
        if (isset($jsonObject->accountNumber)) {
            $apmResource->setAccountNumber($jsonObject->accountNumber);
        }
        if (isset($jsonObject->bankName)) {
            $apmResource->setBankName($jsonObject->bankName);
        }
        if (isset($jsonObject->bankCode)) {
            $apmResource->setBankCode($jsonObject->bankCode);
        }
        if (isset($jsonObject->bic)) {
            $apmResource->setBic($jsonObject->bic);
        }
        if (isset($jsonObject->paymentPurpose)) {
            $apmResource->setPaymentPurpose($jsonObject->paymentPurpose);
        }
        if (isset($jsonObject->iban)) {
            $apmResource->setIban($jsonObject->iban);
        }
        if (isset($jsonObject->countryCode)) {
            $apmResource->setCountryCode($jsonObject->countryCode);
        }
        if (isset($jsonObject->apm)) {
            $apmResource->setApm($jsonObject->apm);
        }
        if (isset($jsonObject->mobilePhone)) {
            $apmResource->setMobilePhone($jsonObject->mobilePhone);
        }
        if (isset($jsonObject->paymentStatus)) {
            $apmResource->setPaymentStatus($jsonObject->paymentStatus);
        }
        return $apmResource;
    }

    public function mapApmResource(ApmResource $apmResource)
    {
        return $this->mapApmResourceFrom($apmResource, $this->jsonObject);
    }
}