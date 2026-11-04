<?php

namespace Iyzipay\Model;

class PayWithIyzicoWidgetBankPlan
{
    private $bankId;
    private $bankName;
    private $bankLogoUrl;
    private $existingCustomer;
    private $monthlyPayments;

    public function getBankId()
    {
        return $this->bankId;
    }

    public function setBankId($bankId)
    {
        $this->bankId = $bankId;
    }

    public function getBankName()
    {
        return $this->bankName;
    }

    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    public function getBankLogoUrl()
    {
        return $this->bankLogoUrl;
    }

    public function setBankLogoUrl($bankLogoUrl)
    {
        $this->bankLogoUrl = $bankLogoUrl;
    }

    public function getExistingCustomer()
    {
        return $this->existingCustomer;
    }

    public function setExistingCustomer($existingCustomer)
    {
        $this->existingCustomer = $existingCustomer;
    }

    /**
     * @return PayWithIyzicoWidgetMonthlyPayment[]
     */
    public function getMonthlyPayments()
    {
        return $this->monthlyPayments;
    }

    public function setMonthlyPayments($monthlyPayments)
    {
        $this->monthlyPayments = $monthlyPayments;
    }
}
