<?php

namespace Iyzipay\Model;

use Iyzipay\Model\Mapper\ReportingPaymentDetailMapper;
use Iyzipay\Options;
use Iyzipay\Request\ReportingPaymentDetailRequest;
use Iyzipay\RequestStringBuilder;

class ReportingPaymentDetail extends ReportingPaymentDetailResource
{
    public static function create(ReportingPaymentDetailRequest $request, Options $options)
    {
        $uri = $options->getBaseUrl() . "/v2/reporting/payment/details" . RequestStringBuilder::requestToStringQuery($request, 'reporting');
        $rawResult = parent::httpClient()->getV2($uri, parent::getHttpHeadersIsV2($uri, null, $options));
        return ReportingPaymentDetailMapper::create($rawResult)->jsonDecode()->mapReportingPaymentDetail(new ReportingPaymentDetail());

    }
}