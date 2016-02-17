<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\InstallmentInfo;

class InstallmentInfoMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new InstallmentInfoMapper();
    }

    public function map(InstallmentInfo $installment, $jsonResult)
    {
        parent::map($installment, $jsonResult);

        if (isset($jsonResult->installmentDetails)) {
            $installment->setInstallmentDetails($jsonResult->installmentDetails);
        }
        return $installment;
    }
}