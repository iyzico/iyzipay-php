<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\InstallmentInfo;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;

class InstallmentInfoTest extends IyzipayResourceTestCase
{
    public function test_should_get_installment_info()
    {
        $this->expectHttpPost();

        $refund = InstallmentInfo::retrieve(new RetrieveInstallmentInfoRequest(), $this->options);

        $this->verifyResource($refund);
    }
}