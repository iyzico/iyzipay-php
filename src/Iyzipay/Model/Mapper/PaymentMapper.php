<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConvertedPayout;
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentItem;

class PaymentMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PaymentMapper($rawResult);
    }

    public function mapPaymentFrom(Payment $payment, $jsonObject)
    {
        parent::mapResourceFrom($payment, $jsonObject);

        if (isset($jsonObject->price)) {
            $payment->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->paidPrice)) {
            $payment->setPaidPrice($jsonObject->paidPrice);
        }
        if (isset($jsonObject->installment)) {
            $payment->setInstallment($jsonObject->installment);
        }
        if (isset($jsonObject->paymentId)) {
            $payment->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->paymentStatus)) {
            $payment->setPaymentStatus($jsonObject->paymentStatus);
        }
        if (isset($jsonObject->fraudStatus)) {
            $payment->setFraudStatus($jsonObject->fraudStatus);
        }
        if (isset($jsonObject->merchantCommissionRate)) {
            $payment->setMerchantCommissionRate($jsonObject->merchantCommissionRate);
        }
        if (isset($jsonObject->merchantCommissionRateAmount)) {
            $payment->setMerchantCommissionRateAmount($jsonObject->merchantCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionRateAmount)) {
            $payment->setIyziCommissionRateAmount($jsonObject->iyziCommissionRateAmount);
        }
        if (isset($jsonObject->iyziCommissionFee)) {
            $payment->setIyziCommissionFee($jsonObject->iyziCommissionFee);
        }
        if (isset($jsonObject->cardType)) {
            $payment->setCardType($jsonObject->cardType);
        }
        if (isset($jsonObject->cardAssociation)) {
            $payment->setCardAssociation($jsonObject->cardAssociation);
        }
        if (isset($jsonObject->cardFamily)) {
            $payment->setCardFamily($jsonObject->cardFamily);
        }
        if (isset($jsonObject->cardUserKey)) {
            $payment->setCardUserKey($jsonObject->cardUserKey);
        }
        if (isset($jsonObject->cardToken)) {
            $payment->setCardToken($jsonObject->cardToken);
        }
        if (isset($jsonObject->binNumber)) {
            $payment->setBinNumber($jsonObject->binNumber);
        }
        if (isset($jsonObject->basketId)) {
            $payment->setBasketId($jsonObject->basketId);
        }
        if (isset($jsonObject->currency)) {
            $payment->setCurrency($jsonObject->currency);
        }
        if (isset($jsonObject->itemTransactions)) {
            $payment->setPaymentItems($this->mapPaymentItems($jsonObject->itemTransactions));
        }
        return $payment;
    }

    public function mapPayment(Payment $payment)
    {
        return $this->mapPaymentFrom($payment, $this->jsonObject);
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