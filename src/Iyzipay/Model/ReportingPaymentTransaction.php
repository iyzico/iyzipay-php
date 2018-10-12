<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ReportingPaymentTransactionMapper;
use Iyzipay\Options;
use Iyzipay\Request\ReportingPaymentTransactionRequest;
use Iyzipay\RequestStringBuilder;

class ReportingPaymentTransaction extends ReportingPaymentTransactionResource
{
    public static function create(ReportingPaymentTransactionRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/reporting/payment/transactions" . RequestStringBuilder::requestToStringQuery($request, 'reportingTransaction');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersV2($uri, null, $options));
        return ReportingPaymentTransactionMapper::create($rawResult)->jsonDecode()->mapReportingPaymentTransaction(new ReportingPaymentTransaction());

    }
}