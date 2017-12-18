<?php

namespace Iyzipay\Model;

class RefundReason
{
    const DOUBLE_PAYMENT = "double payment";
    const BUYER_REQUEST = "buyer request";
    const FRAUD = "fraud";
    const OTHER = "other";
}