<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CrossBookingFromSubMerchant;

class CrossBookingFromSubMerchantMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CrossBookingFromSubMerchantMapper();
    }

    public function map(CrossBookingFromSubMerchant $booking, $jsonResult)
    {
        parent::map($booking, $jsonResult);
        return $booking;
    }
}