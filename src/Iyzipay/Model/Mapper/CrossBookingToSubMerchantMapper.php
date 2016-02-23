<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CrossBookingToSubMerchant;

class CrossBookingToSubMerchantMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CrossBookingToSubMerchantMapper();
    }

    public function mapCrossBookingToSubMerchant(CrossBookingToSubMerchant $booking, $jsonResult)
    {
        parent::mapResource($booking, $jsonResult);
        return $booking;
    }
}