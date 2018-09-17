<?php

namespace Iyzipay;

class Base64FileHelper
{
    public static function encode($filePath)
    {

        $imageBinary  = fread(fopen($filePath, "r"), filesize($filePath));
        $base64Binary = base64_encode($imageBinary);

        return $base64Binary;
    }

}