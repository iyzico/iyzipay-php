<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\CrossBookingFromSubMerchant;

class CrossBookingFromSubMerchantMapper extends IyzipayResourceMapper
{
    public static function create()
    {
        return new CrossBookingFromSubMerchantMapper();
    }

    public function mapCrossBookingFromSubMerchant(CrossBookingFromSubMerchant $booking, $jsonResult)
    {
        parent::mapResource($booking, $jsonResult);
        return $booking;
    }
}