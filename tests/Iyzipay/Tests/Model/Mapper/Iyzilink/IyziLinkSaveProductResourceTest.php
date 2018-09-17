<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;


use Iyzipay\Model\Iyzilink\IyziLinkSaveProductResource;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetriveAllProductResourceMapper;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkSaveProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Tests\TestCase;

class IyziLinkSaveProductResourceTest extends TestCase
{
    public function test_should_map_iyzilink_save_product_mapper_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-save-product.json");

        $iyziLinkAddProduct = IyziLinkSaveProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkSaveProductResource());


        $this->assertNotEmpty($iyziLinkAddProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkAddProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkAddProduct->getLocale());
        $this->assertEquals(1536955433196, $iyziLinkAddProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkAddProduct->getConversationId());
        $this->assertJson($iyziLinkAddProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkAddProduct->getRawResult());
    }
}