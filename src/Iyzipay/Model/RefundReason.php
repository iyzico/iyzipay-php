<?php

namespace Iyzipay\Model;

class RefundReason
{
    const DOUBLE_PAYMENT = "double_payment";
    const BUYER_REQUEST = "buyer_request";
    const FRAUD = "fraud";
    const OTHER = "other";
}