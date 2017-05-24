<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\Apm;
use Iyzipay\Request\CreateApmInitializeRequest;
use Iyzipay\Request\RetrieveApmRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class ApmTest extends IyzipayResourceTestCase
{
    public function test_should_create_apm()
    {
        $this->expectHttpPost();

        $apm = Apm::create(new CreateApmInitializeRequest(), $this->options);

        $this->verifyResource($apm);
    }

    public function test_should_retrieve_apm()
    {
        $this->expectHttpPost();

        $apm = Apm::retrieve(new RetrieveApmRequest(), $this->options);

        $this->verifyResource($apm);
    }
}