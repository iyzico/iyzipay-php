<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\BinNumber;
use Iyzipay\Request\RetrieveBinNumberRequest;

class BinNumberTest extends IyzipayResourceTestCase
{
    public function test_should_get_bin_number()
    {
        $this->expectHttpPost();

        $binNumber = BinNumber::retrieve(new RetrieveBinNumberRequest(), $this->options);

        $this->verifyResource($binNumber);
    }
}