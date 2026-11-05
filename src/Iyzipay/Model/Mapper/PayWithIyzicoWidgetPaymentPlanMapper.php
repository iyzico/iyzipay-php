<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayWithIyzicoWidgetBankPlan;
use Iyzipay\Model\PayWithIyzicoWidgetMonthlyPayment;
use Iyzipay\Model\PayWithIyzicoWidgetPaymentPlan;
use Iyzipay\Model\PayWithIyzicoWidgetPaymentPlanDetail;

class PayWithIyzicoWidgetPaymentPlanMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayWithIyzicoWidgetPaymentPlanMapper($rawResult);
    }

    public function mapPayWithIyzicoWidgetPaymentPlanFrom(PayWithIyzicoWidgetPaymentPlan $paymentPlan, $jsonObject)
    {
        parent::mapResourceFrom($paymentPlan, $jsonObject);

        if (isset($jsonObject->filteredPlans)) {
            $paymentPlan->setFilteredPlans($this->mapBankPlans($jsonObject->filteredPlans));
        }
        return $paymentPlan;
    }

    public function mapPayWithIyzicoWidgetPaymentPlan(PayWithIyzicoWidgetPaymentPlan $paymentPlan)
    {
        return $this->mapPayWithIyzicoWidgetPaymentPlanFrom($paymentPlan, $this->jsonObject);
    }

    private function mapBankPlans($filteredPlans)
    {
        $bankPlans = array();

        foreach ($filteredPlans as $index => $filteredPlan) {
            $bankPlan = new PayWithIyzicoWidgetBankPlan();

            if (isset($filteredPlan->bankId)) {
                $bankPlan->setBankId($filteredPlan->bankId);
            }
            if (isset($filteredPlan->bankName)) {
                $bankPlan->setBankName($filteredPlan->bankName);
            }
            if (isset($filteredPlan->bankLogoUrl)) {
                $bankPlan->setBankLogoUrl($filteredPlan->bankLogoUrl);
            }
            if (isset($filteredPlan->existingCustomer)) {
                $bankPlan->setExistingCustomer($filteredPlan->existingCustomer);
            }
            if (isset($filteredPlan->monthlyPayments)) {
                $bankPlan->setMonthlyPayments($this->mapMonthlyPayments($filteredPlan->monthlyPayments));
            }
            $bankPlans[$index] = $bankPlan;
        }
        return $bankPlans;
    }

    private function mapMonthlyPayments($monthlyPayments)
    {
        $payments = array();

        foreach ($monthlyPayments as $index => $monthlyPayment) {
            $payment = new PayWithIyzicoWidgetMonthlyPayment();

            if (isset($monthlyPayment->productType)) {
                $payment->setProductType($monthlyPayment->productType);
            }
            if (isset($monthlyPayment->paymentPlans)) {
                $payment->setPaymentPlans($this->mapPaymentPlanDetails($monthlyPayment->paymentPlans));
            }
            if (isset($monthlyPayment->campaigns)) {
                $payment->setCampaigns($monthlyPayment->campaigns);
            }
            $payments[$index] = $payment;
        }
        return $payments;
    }

    private function mapPaymentPlanDetails($paymentPlans)
    {
        $details = array();

        foreach ($paymentPlans as $index => $paymentPlan) {
            $detail = new PayWithIyzicoWidgetPaymentPlanDetail();

            if (isset($paymentPlan->term)) {
                $detail->setTerm($paymentPlan->term);
            }
            if (isset($paymentPlan->interestRate)) {
                $detail->setInterestRate($paymentPlan->interestRate);
            }
            if (isset($paymentPlan->amount)) {
                $detail->setAmount($paymentPlan->amount);
            }
            if (isset($paymentPlan->totalPaymentAmount)) {
                $detail->setTotalPaymentAmount($paymentPlan->totalPaymentAmount);
            }
            if (isset($paymentPlan->annualEffectiveInterestRate)) {
                $detail->setAnnualEffectiveInterestRate($paymentPlan->annualEffectiveInterestRate);
            }
            if (isset($paymentPlan->monthlyEffectiveInterestRate)) {
                $detail->setMonthlyEffectiveInterestRate($paymentPlan->monthlyEffectiveInterestRate);
            }
            $details[$index] = $detail;
        }
        return $details;
    }
}
