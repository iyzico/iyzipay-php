<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ReportingPaymentDetailResource;

class ReportingPaymentDetailResourceMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new ReportingPaymentDetailResourceMapper($rawResult);
    }

    public function mapReportingPaymentDetailResourceFrom(ReportingPaymentDetailResource $create, $jsonObject)
    {
        parent::mapResourceFrom($create, $jsonObject);

        if (isset($jsonObject->payments)) {
            $create->setPayments($jsonObject->payments);
        }

        return $create;
    }

    public function mapReportingPaymentDetailResource(ReportingPaymentDetailResource $create)
    {
        return $this->mapReportingPaymentDetailResourceFrom($create, $this->jsonObject);
    }
}