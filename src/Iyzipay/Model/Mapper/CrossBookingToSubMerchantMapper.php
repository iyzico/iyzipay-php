<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CrossBookingToSubMerchant;

class CrossBookingToSubMerchantMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CrossBookingToSubMerchantMapper();
    }

    public function map(CrossBookingToSubMerchant $booking, $jsonResult)
    {
        parent::map($booking, $jsonResult);

        return $booking;
    }
}