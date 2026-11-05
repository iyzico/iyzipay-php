<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\PayWithIyzicoWidgetPaymentPlanMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrievePayWithIyzicoWidgetPaymentPlanRequest;

class PayWithIyzicoWidgetPaymentPlan extends IyzipayResource
{
    private $filteredPlans;

    public static function retrieve(RetrievePayWithIyzicoWidgetPaymentPlanRequest $request, Options $options)
    {
        $url = "/v1/pay-with-iyzico/widget/credit/payment-plan";
        $rawResult = parent::httpClient()->post($options->getBaseUrl() . $url, parent::getHttpHeadersV2($url, $request, $options), $request->toJsonString());
        return PayWithIyzicoWidgetPaymentPlanMapper::create($rawResult)->jsonDecode()->mapPayWithIyzicoWidgetPaymentPlan(new PayWithIyzicoWidgetPaymentPlan());
    }

    /**
     * @return PayWithIyzicoWidgetBankPlan[]
     */
    public function getFilteredPlans()
    {
        return $this->filteredPlans;
    }

    public function setFilteredPlans($filteredPlans)
    {
        $this->filteredPlans = $filteredPlans;
    }
}
