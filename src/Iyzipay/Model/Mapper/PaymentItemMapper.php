<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConvertedPayout;
use Iyzipay\Model\PaymentItem;

class PaymentItemMapper
{
    public static function create()
    {
        return new PaymentItemMapper();
    }

    public function mapPaymentItems($itemTransactions)
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
            if (isset($itemTransaction->withholdingTax)) {
                $paymentItem->setWithholdingTax($itemTransaction->withholdingTax);
            }
            $paymentItems[$index] = $paymentItem;
        }
        return $paymentItems;
    }

    private function mapConvertedPayout($payout)
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