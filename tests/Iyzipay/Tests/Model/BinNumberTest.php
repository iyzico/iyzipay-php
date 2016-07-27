<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\BinNumber;
use Iyzipay\Request\RetrieveBinNumberRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class BinNumberTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_bin_number()
    {
        $this->expectHttpPost();

        $binNumber = BinNumber::retrieve(new RetrieveBinNumberRequest(), $this->options);

        $this->verifyResource($binNumber);
    }
}