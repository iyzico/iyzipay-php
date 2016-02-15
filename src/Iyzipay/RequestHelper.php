<?php

namespace Iyzipay;

class RequestHelper
{
    const AUTHORIZATION_HEADER_NAME = "Authorization";
    const RANDOM_HEADER_NAME = "x-iyzi-rnd";
    const AUTHORIZATION_HEADER_STRING = "IYZWS %s:%s";
    const RANDOM_STRING_SIZE = 8;

    public static function formatHeaderString($args)
    {
        return vsprintf(self::AUTHORIZATION_HEADER_STRING, $args);
    }
}