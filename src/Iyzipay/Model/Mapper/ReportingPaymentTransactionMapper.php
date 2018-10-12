<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\ReportingPaymentTransaction;

class ReportingPaymentTransactionMapper extends ReportingPaymentTransactionResourceMapper
{
    public static function create($rawResult = null)
    {

        return new ReportingPaymentTransactionMapper($rawResult);
    }

    public function mapReportingPaymentTransactionFrom(ReportingPaymentTransaction $create, $jsonObject)
    {
        parent::mapReportingPaymentTransactionResourceFrom($create, $jsonObject);
        return $create;
    }

    public function mapReportingPaymentTransaction(ReportingPaymentTransaction $create)
    {
        return $this->mapReportingPaymentTransactionFrom($create, $this->jsonObject);
    }
}