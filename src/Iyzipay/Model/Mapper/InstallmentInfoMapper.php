<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\InstallmentDetail;
use Iyzipay\Model\InstallmentInfo;
use Iyzipay\Model\InstallmentPrice;

class InstallmentInfoMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new InstallmentInfoMapper();
    }

    public function mapInstallmentInfo(InstallmentInfo $installment, $jsonResult)
    {
        parent::mapResource($installment, $jsonResult);

        if (isset($jsonResult->installmentDetails)) {
            $installment->setInstallmentDetails($this->mapInstallmentDetails($jsonResult->installmentDetails));
        }
        return $installment;
    }

    private function mapInstallmentDetails($installmentDetails)
    {
        $details = array();

        foreach ($installmentDetails as $index => $installmentDetail) {
            $detail = new InstallmentDetail();

            if (isset($installmentDetail->binNumber)) {
                $detail->setBinNumber($installmentDetail->binNumber);
            }
            if (isset($installmentDetail->price)) {
                $detail->setPrice($installmentDetail->price);
            }
            if (isset($installmentDetail->cardType)) {
                $detail->setCardType($installmentDetail->cardType);
            }
            if (isset($installmentDetail->cardAssociation)) {
                $detail->setCardAssociation($installmentDetail->cardAssociation);
            }
            if (isset($installmentDetail->cardFamilyName)) {
                $detail->setCardFamilyName($installmentDetail->cardFamilyName);
            }
            if (isset($installmentDetail->force3ds)) {
                $detail->setForce3ds($installmentDetail->force3ds);
            }
            if (isset($installmentDetail->bankCode)) {
                $detail->setBankCode($installmentDetail->bankCode);
            }
            if (isset($installmentDetail->bankName)) {
                $detail->setBankName($installmentDetail->bankName);
            }
            if (isset($installmentDetail->installmentPrices)) {
                $detail->setInstallmentPrices($this->mapInstallmentPrices($installmentDetail->installmentPrices));
            }
            $details[$index] = $detail;
        }

        return $details;
    }

    private function mapInstallmentPrices($installmentPrices)
    {
        $prices = array();

        foreach ($installmentPrices as $index => $installmentPrice) {
            $price = new InstallmentPrice();

            if (isset($installmentPrice->installmentPrice)) {
                $price->setInstallmentPrice($installmentPrice->installmentPrice);
            }
            if (isset($installmentPrice->totalPrice)) {
                $price->setTotalPrice($installmentPrice->totalPrice);
            }
            if (isset($installmentPrice->installmentNumber)) {
                $price->setInstallmentNumber($installmentPrice->installmentNumber);
            }
            $prices[$index] = $price;
        }

        return $prices;
    }
}