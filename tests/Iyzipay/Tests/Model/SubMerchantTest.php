<?php

namespace Iyzipay\Tests\Model;

use Iyzipay\Model\SubMerchant;
use Iyzipay\Request\CreateSubMerchantRequest;
use Iyzipay\Request\RetrieveSubMerchantRequest;
use Iyzipay\Request\UpdateSubMerchantRequest;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubMerchantTest extends IyzipayResourceTestCase
{
    public function test_should_create_sub_merchant()
    {
        $this->expectHttpPost();

        $subMerchant = SubMerchant::create(new CreateSubMerchantRequest(), $this->options);

        $this->verifyResource($subMerchant);
    }

    public function test_should_update_sub_merchant()
    {
        $this->expectHttpPut();

        $subMerchant = SubMerchant::update(new UpdateSubMerchantRequest(), $this->options);

        $this->verifyResource($subMerchant);
    }

    public function test_should_retrieve_sub_merchant()
    {
        $this->expectHttpPost();

        $subMerchant = SubMerchant::retrieve(new RetrieveSubMerchantRequest(), $this->options);

        $this->verifyResource($subMerchant);
    }
}