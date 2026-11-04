<?php

namespace Iyzipay\Model;

class PayWithIyzicoWidgetMonthlyPayment
{
    private $productType;
    private $paymentPlans;
    private $campaigns;

    public function getProductType()
    {
        return $this->productType;
    }

    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @return PayWithIyzicoWidgetPaymentPlanDetail[]
     */
    public function getPaymentPlans()
    {
        return $this->paymentPlans;
    }

    public function setPaymentPlans($paymentPlans)
    {
        $this->paymentPlans = $paymentPlans;
    }

    public function getCampaigns()
    {
        return $this->campaigns;
    }

    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }
}
