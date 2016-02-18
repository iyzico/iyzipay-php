<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectCancel;

class ConnectCancelMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new ConnectCancelMapper();
    }

    public function map(ConnectCancel $cancel, $jsonResult)
    {
        parent::map($cancel, $jsonResult);

        if (isset($jsonResult->paymentId)) {
            $cancel->setPaymentId($jsonResult->paymentId);
        }
        if (isset($jsonResult->price)) {
            $cancel->setPrice($jsonResult->price);
        }
        if (isset($jsonResult->connectorName)) {
            $cancel->setConnectorName($jsonResult->connectorName);
        }
        return $cancel;
    }
}