<?php

namespace Iyzipay\Model;

class PayWithIyzicoWidgetPaymentPlanDetail
{
    private $term;
    private $interestRate;
    private $amount;
    private $totalPaymentAmount;
    private $annualEffectiveInterestRate;
    private $monthlyEffectiveInterestRate;

    public function getTerm()
    {
        return $this->term;
    }

    public function setTerm($term)
    {
        $this->term = $term;
    }

    public function getInterestRate()
    {
        return $this->interestRate;
    }

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getTotalPaymentAmount()
    {
        return $this->totalPaymentAmount;
    }

    public function setTotalPaymentAmount($totalPaymentAmount)
    {
        $this->totalPaymentAmount = $totalPaymentAmount;
    }

    public function getAnnualEffectiveInterestRate()
    {
        return $this->annualEffectiveInterestRate;
    }

    public function setAnnualEffectiveInterestRate($annualEffectiveInterestRate)
    {
        $this->annualEffectiveInterestRate = $annualEffectiveInterestRate;
    }

    public function getMonthlyEffectiveInterestRate()
    {
        return $this->monthlyEffectiveInterestRate;
    }

    public function setMonthlyEffectiveInterestRate($monthlyEffectiveInterestRate)
    {
        $this->monthlyEffectiveInterestRate = $monthlyEffectiveInterestRate;
    }
}
