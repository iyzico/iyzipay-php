<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CheckoutFormAuth;

class CheckoutFormAuthMapper
{
    public static function create()
    {
        return new CheckoutFormAuthMapper();
    }

    public function map(CheckoutFormAuth $auth, $jsonResult)
    {
        if (isset($jsonResult->token)) {
            $auth->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $auth->setCallbackUrl($jsonResult->callbackUrl);
        }
        if (isset($jsonResult->price)) {
            $auth->setPrice($jsonResult->price);
        }
        if (isset($jsonResult->paidPrice)) {
            $auth->setPaidPrice($jsonResult->paidPrice);
        }
        if (isset($jsonResult->installmen)) {
            $auth->setInstallment($jsonResult->installment);
        }
        if (isset($jsonResult->paymentId)) {
            $auth->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->paymentStatus)) {
            $auth->setPaymentStatus($jsonResult->paymentStatus);
        }
        if (isset($jsonResult->fraudStatus)) {
            $auth->setFraudStatus($jsonResult->fraudStatus);
        }
        if (isset($jsonResult->merchantCommissionRate)) {
            $auth->setMerchantCommissionRate($jsonResult->merchantCommissionRate);
        }
        if (isset($jsonResult->merchantCommissionRateAmount)) {
            $auth->setMerchantCommissionRateAmount($jsonResult->merchantCommissionRateAmount);
        }
        if (isset($jsonResult->iyziCommissionFee)) {
            $auth->setIyziCommissionFee($jsonResult->iyziCommissionFee);
        }
        if (isset($jsonResult->iyziCommissionRateAmount)) {
            $auth->setIyziCommissionRateAmount($jsonResult->iyziCommissionRateAmount);
        }
        if (isset($jsonResult->cardType)) {
            $auth->setCardType($jsonResult->cardType);
        }
        if (isset($jsonResult->cardAssociation)) {
            $auth->setCardAssociation($jsonResult->cardAssociation);
        }
        if (isset($jsonResult->cardFamily)) {
            $auth->setCardFamily($jsonResult->cardFamily);
        }
        if (isset($jsonResult->cardToken)) {
            $auth->setCardToken($jsonResult->cardToken);
        }
        if (isset($jsonResult->cardUserKey)) {
            $auth->setCardUserKey($jsonResult->cardUserKey);
        }
        if (isset($jsonResult->binNumber)) {
            $auth->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->basketId)) {
            $auth->setBasketId($jsonResult->basketId);
        }
        if (isset($jsonResult->paymentItems)) {
            $auth->setPaymentItems($jsonResult->paymentItems);
        }
        if (isset($jsonResult->status)) {
            $auth->setStatus($jsonResult->status);
        }
        if (isset($jsonResult->errorCode)) {
            $auth->setErrorCode($jsonResult->errorCode);
        }
        if (isset($jsonResult->errorMessage)) {
            $auth->setErrorMessage($jsonResult->errorMessage);
        }
        if (isset($jsonResult->errorGroup)) {
            $auth->setErrorGroup($jsonResult->errorGroup);
        }
        if (isset($jsonResult->locale)) {
            $auth->setLocale($jsonResult->locale);
        }
        if (isset($jsonResult->systemTime)) {
            $auth->setSystemTime($jsonResult->systemTime);
        }
        if (isset($jsonResult->conversationId)) {
            $auth->setConversationId($jsonResult->conversationId);
        }
        return $auth;
    }
}