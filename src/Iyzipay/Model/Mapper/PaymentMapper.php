<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentItem;

class PaymentMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new PaymentMapper();
    }

    public function mapPayment(Payment $payment, $jsonResult)
    {
        parent::mapResource($payment, $jsonResult);

        if (isset($jsonResult->price)) {
            $payment->setPrice($jsonResult->price);
        }
        if (isset($jsonResult->paidPrice)) {
            $payment->setPaidPrice($jsonResult->paidPrice);
        }
        if (isset($jsonResult->installment)) {
            $payment->setInstallment($jsonResult->installment);
        }
        if (isset($jsonResult->paymentId)) {
            $payment->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->paymentStatus)) {
            $payment->setPaymentStatus($jsonResult->paymentStatus);
        }
        if (isset($jsonResult->fraudStatus)) {
            $payment->setFraudStatus($jsonResult->fraudStatus);
        }
        if (isset($jsonResult->merchantCommissionRate)) {
            $payment->setMerchantCommissionRate($jsonResult->merchantCommissionRate);
        }
        if (isset($jsonResult->merchantCommissionRateAmount)) {
            $payment->setMerchantCommissionRateAmount($jsonResult->merchantCommissionRateAmount);
        }
        if (isset($jsonResult->iyziCommissionRateAmount)) {
            $payment->setIyziCommissionRateAmount($jsonResult->iyziCommissionRateAmount);
        }
        if (isset($jsonResult->iyziCommissionFee)) {
            $payment->setIyziCommissionFee($jsonResult->iyziCommissionFee);
        }
        if (isset($jsonResult->cardType)) {
            $payment->setCardType($jsonResult->cardType);
        }
        if (isset($jsonResult->cardAssociation)) {
            $payment->setCardAssociation($jsonResult->cardAssociation);
        }
        if (isset($jsonResult->cardFamily)) {
            $payment->setCardFamily($jsonResult->cardFamily);
        }
        if (isset($jsonResult->cardUserKey)) {
            $payment->setCardUserKey($jsonResult->cardUserKey);
        }
        if (isset($jsonResult->cardToken)) {
            $payment->setCardToken($jsonResult->cardToken);
        }
        if (isset($jsonResult->binNumber)) {
            $payment->setBinNumber($jsonResult->binNumber);
        }
        if (isset($jsonResult->basketId)) {
            $payment->setBasketId($jsonResult->basketId);
        }
        if (isset($jsonResult->itemTransactions)) {
            $payment->setPaymentItems($this->mapPaymentItems($jsonResult->itemTransactions));
        }
        return $payment;
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
            $paymentItems[$index] = $paymentItem;
        }

        return $paymentItems;
    }
}