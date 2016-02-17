<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectCancel;

class ConnectCancelMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectCancelMapper();
    }

    public function map(ConnectCancel $connect, $jsonResult)
    {
        parent::map($connect, $jsonResult);

        if(isset($jsonResult->paymentId)) {
            $connect->setPaymentId($jsonResult->paymentId);
        }
        if(isset($jsonResult->price)) {
            $connect->setPrice($jsonResult->price);
        }
        if(isset($jsonResult->convertorName)) {
            $connect->setConnnectorName($jsonResult->convertorName);
        }
        return $connect;
    }
}