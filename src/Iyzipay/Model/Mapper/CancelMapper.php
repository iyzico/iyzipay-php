<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\Cancel;

class CancelMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new BinNumberMapper();
    }

    public function map(Cancel $cancel, $jsonResult)
    {
        parent::map($cancel, $jsonResult);

        if (isset($jsonResult->paymentId)) {
            $cancel->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->price)) {
            $cancel->setPrice($jsonResult->price);
        }
        return $cancel;
    }
}