<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConvertedPayout;
use Iyzipay\Model\PaymentItem;
use Iyzipay\Model\PaymentResource;

class PaymentResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentResourceMapper($rawResult);
    }

    public function mapPaymentResourceFrom(PaymentResource $paymentResource, $jsonObject)
    {
        parent::mapResourceFrom($paymentResource, $jsonObject);

        if (isset($jsonObject->price)) {
            $paymentResource->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->paidPrice)) {
            $paymentResource->setPaidPrice($jsonObject->paidPrice);
        }
        if (isset($jsonObject->installment)) {
            $paymentResource->setInstallment($jsonObject->installment);
        }
        if (isset($jsonObject->paymentId)) {
            $paymentResource->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentStatus)) {
            $paymentResource->setPaymentStatus($jsonObject->paymentStatus);
        }
        if (isset($jsonObject->fraudStatus)) {
            $paymentResource->setFraudStatus($jsonObject->fraudStatus);
        }
        if (isset($jsonObject->merchantCommissionRate)) {
            $paymentResource->setMerchantCommissionRate($jsonObject->merchantCommissionRate);
        }
        if (isset($jsonObject->merchantCommissionRateAmount)) {
            $paymentResource->setMerchantCommissionRateAmount($jsonObject->merchantCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionRateAmount)) {
            $paymentResource->setIyziCommissionRateAmount($jsonObject->iyziCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionFee)) {
            $paymentResource->setIyziCommissionFee($jsonObject->iyziCommissionFee);
        }
        if (isset($jsonObject->cardType)) {
            $paymentResource->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $paymentResource->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $paymentResource->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->cardUserKey)) {
            $paymentResource->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->cardToken)) {
            $paymentResource->setCardToken($jsonObject->cardToken);
        }
        if (isset($jsonObject->binNumber)) {
            $paymentResource->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->basketId)) {
            $paymentResource->setBasketId($jsonObject->basketId);
        }
        if (isset($jsonObject->currency)) {
            $paymentResource->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->itemTransactions)) {
            $paymentResource->setPaymentItems($this->mapPaymentItems($jsonObject->itemTransactions));
        }
        if (isset($jsonObject->connectorName)) {
            $paymentResource->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->authCode)) {
            $paymentResource->setAuthCode($jsonObject->authCode);
        }
        if (isset($jsonObject->phase)) {
            $paymentResource->setPhase($jsonObject->phase);
        }
        return $paymentResource;
    }

    public function mapPaymentResource(PaymentResource $paymentResource)
    {
        return $this->mapPaymentResourceFrom($paymentResource, $this->jsonObject);
    }

    private function mapPaymentItems($itemTransactions)
    {
        $paymentItems = array();

        foreach ($itemTransactions as $index => $itemTransaction) {
            $paymentItem = new PaymentItem();

            if (isset($itemTransaction->itemId)) {
                $paymentItem->setItemId($itemTransaction->itemId);
            }
            if (isset($itemTransaction->paymentTransactionId)) {
                $paymentItem->setPaymentTransactionId($itemTransaction->paymentTransactionId);
            }
            if (isset($itemTransaction->transactionStatus)) {
                $paymentItem->setTransactionStatus($itemTransaction->transactionStatus);
            }
            if (isset($itemTransaction->price)) {
                $paymentItem->setPrice($itemTransaction->price);
            }
            if (isset($itemTransaction->paidPrice)) {
                $paymentItem->setPaidPrice($itemTransaction->paidPrice);
            }
            if (isset($itemTransaction->merchantCommissionRate)) {
                $paymentItem->setMerchantCommissionRate($itemTransaction->merchantCommissionRate);
            }
            if (isset($itemTransaction->merchantCommissionRateAmount)) {
                $paymentItem->setMerchantCommissionRateAmount($itemTransaction->merchantCommissionRateAmount);
            }
            if (isset($itemTransaction->iyziCommissionRateAmount)) {
                $paymentItem->setIyziCommissionRateAmount($itemTransaction->iyziCommissionRateAmount);
            }
            if (isset($itemTransaction->iyziCommissionFee)) {
                $paymentItem->setIyziCommissionFee($itemTransaction->iyziCommissionFee);
            }
            if (isset($itemTransaction->blockageRate)) {
                $paymentItem->setBlockageRate($itemTransaction->blockageRate);
            }
            if (isset($itemTransaction->blockageRateAmountMerchant)) {
                $paymentItem->setBlockageRateAmountMerchant($itemTransaction->blockageRateAmountMerchant);
            }
            if (isset($itemTransaction->blockageRateAmountSubMerchant)) {
                $paymentItem->setBlockageRateAmountSubMerchant($itemTransaction->blockageRateAmountSubMerchant);
            }
            if (isset($itemTransaction->blockageResolvedDate)) {
                $paymentItem->setBlockageResolvedDate($itemTransaction->blockageResolvedDate);
            }
            if (isset($itemTransaction->subMerchantKey)) {
                $paymentItem->setSubMerchantKey($itemTransaction->subMerchantKey);
            }
            if (isset($itemTransaction->subMerchantPrice)) {
                $paymentItem->setSubMerchantPrice($itemTransaction->subMerchantPrice);
            }
            if (isset($itemTransaction->subMerchantPayoutRate)) {
                $paymentItem->setSubMerchantPayoutRate($itemTransaction->subMerchantPayoutRate);
            }
            if (isset($itemTransaction->subMerchantPayoutAmount)) {
                $paymentItem->setSubMerchantPayoutAmount($itemTransaction->subMerchantPayoutAmount);
            }
            if (isset($itemTransaction->merchantPayoutAmount)) {
                $paymentItem->setMerchantPayoutAmount($itemTransaction->merchantPayoutAmount);
            }
            if (isset($itemTransaction->convertedPayout)) {
                $paymentItem->setConvertedPayout($this->mapConvertedPayout($itemTransaction->convertedPayout));
            }
            $paymentItems[$index] = $paymentItem;
        }
        return $paymentItems;
    }

    public function mapConvertedPayout($payout)
    {
        $convertedPayout = new ConvertedPayout();

        if (isset($payout->paidPrice)) {
            $convertedPayout->setPaidPrice($payout->paidPrice);
        }
        if (isset($payout->iyziCommissionRateAmount)) {
            $convertedPayout->setIyziCommissionRateAmount($payout->iyziCommissionRateAmount);
        }
        if (isset($payout->iyziCommissionFee)) {
            $convertedPayout->setIyziCommissionFee($payout->iyziCommissionFee);
        }
        if (isset($payout->blockageRateAmountMerchant)) {
            $convertedPayout->setBlockageRateAmountMerchant($payout->blockageRateAmountMerchant);
        }
        if (isset($payout->blockageRateAmountSubMerchant)) {
            $convertedPayout->setBlockageRateAmountSubMerchant($payout->blockageRateAmountSubMerchant);
        }
        if (isset($payout->subMerchantPayoutAmount)) {
            $convertedPayout->setSubMerchantPayoutAmount($payout->subMerchantPayoutAmount);
        }
        if (isset($payout->merchantPayoutAmount)) {
            $convertedPayout->setMerchantPayoutAmount($payout->merchantPayoutAmount);
        }
        if (isset($payout->iyziConversionRate)) {
            $convertedPayout->setIyziConversionRate($payout->iyziConversionRate);
        }
        if (isset($payout->iyziConversionRateAmount)) {
            $convertedPayout->setIyziConversionRateAmount($payout->iyziConversionRateAmount);
        }
        if (isset($payout->currency)) {
            $convertedPayout->setCurrency($payout->currency);
        }
        return $convertedPayout;
    }
}