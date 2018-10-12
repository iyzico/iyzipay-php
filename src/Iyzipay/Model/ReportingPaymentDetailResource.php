<?php

namespace Iyzipay\Model;

use Iyzipay\IyzipayResource;

class ReportingPaymentDetailResource extends IyzipayResource
{
    private $payments;

    public function getPayments()
    {
        return $this->payments;
    }

    public function setPayments($payments)
    {
        $this->payments = $payments;
    }
}