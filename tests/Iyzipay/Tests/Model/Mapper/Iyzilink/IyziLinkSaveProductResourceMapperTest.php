<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;


use Iyzipay\Model\Iyzilink\IyziLinkSaveProductResource;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkSaveProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class IyziLinkSaveProductResourceMapperTest extends TestCase
{
    public function test_should_map_iyzilink_save_product_resource_mapper_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-save-product.json");

        $iyziLinkAddProduct = IyziLinkSaveProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkSaveProductResource());

        $this->assertNotEmpty($iyziLinkAddProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkAddProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkAddProduct->getLocale());
        $this->assertEquals(1536955433196, $iyziLinkAddProduct->getSystemTime());
        $this->assertEquals(null, $iyziLinkAddProduct->getToken());
        $this->assertEquals(null, $iyziLinkAddProduct->getaddressIgnorable());
        $this->assertEquals(null, $iyziLinkAddProduct->getSoldLimit());
        $this->assertEquals(null, $iyziLinkAddProduct->getUrl());
        $this->assertEquals(null, $iyziLinkAddProduct->getImageUrl());
        $this->assertEquals(null, $iyziLinkAddProduct->getPrice());
        $this->assertEquals(null, $iyziLinkAddProduct->getCurrency());
        $this->assertEquals(null, $iyziLinkAddProduct->getBase64EncodedImage());
        $this->assertEquals(null, $iyziLinkAddProduct->getErrorCode());
        $this->assertEquals(null, $iyziLinkAddProduct->getErrorMessage());
        $this->assertEquals(null, $iyziLinkAddProduct->getErrorGroup());

        $this->assertJson($iyziLinkAddProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkAddProduct->getRawResult());
    }
}