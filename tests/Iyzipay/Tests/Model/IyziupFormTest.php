<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\IyziupForm;
use Iyzipay\Request\RetrieveIyziupFormRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class IyziupFormTest extends IyzipayResourceTestCase
{
    public function test_should_retrieve_iyziup_form()
    {
        $this->expectHttpPost();

        $iyziupForm = IyziupForm::retrieve(new RetrieveIyziupFormRequest(), $this->options);

        $this->verifyResource($iyziupForm);
    }
}