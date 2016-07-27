<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\InstallmentInfo;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class InstallmentInfoTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_installment_info()
    {
        $this->expectHttpPost();

        $installmentInfo = InstallmentInfo::retrieve(new RetrieveInstallmentInfoRequest(), $this->options);

        $this->verifyResource($installmentInfo);
    }
}