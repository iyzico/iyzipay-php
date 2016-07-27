<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\InstallmentHtml;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class InstallmentHtmlTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_installment_html()
    {
        $this->expectHttpPost();

        $InstallmentHtml = InstallmentHtml::retrieve(new RetrieveInstallmentInfoRequest(), $this->options);

        $this->verifyResource($InstallmentHtml);
    }
}