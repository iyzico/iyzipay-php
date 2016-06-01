<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ConnectCancel;

class ConnectCancelMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ConnectCancelMapper($rawResult);
    }

    public function mapConnectCancelFrom(ConnectCancel $cancel, $jsonObject)
    {
        parent::mapResourceFrom($cancel, $jsonObject);

        if (isset($jsonObject->paymentId)) {
            $cancel->setPaymentId($jsonObject->paymentId);
        }
        if (isset($jsonObject->price)) {
            $cancel->setPrice($jsonObject->price);
        }
        if (isset($jsonObject->connectorName)) {
            $cancel->setConnectorName($jsonObject->connectorName);
        }
        if (isset($jsonObject->currency)) {
            $cancel->setCurrency($jsonObject->currency);
        }
        return $cancel;
    }

    public function mapConnectCancel(ConnectCancel $cancel)
    {
        return $this->mapConnectCancelFrom($cancel, $this->jsonObject);
    }
}