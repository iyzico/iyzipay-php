<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkSaveProduct;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkSaveProductMapper;
use Iyzipay\Tests\TestCase;

class IyziLinkSaveProductMapperTest extends TestCase
{
    public function test_should_map_iyzilink_save_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-save-product.json");

        $iyziLinkAddProduct = IyziLinkSaveProductMapper::create($json)->jsonDecode()->mapIyziLinkSaveProduct(new IyziLinkSaveProduct());

        $this->assertNotEmpty($iyziLinkAddProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkAddProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkAddProduct->getLocale());
        $this->assertEquals(1536955433196, $iyziLinkAddProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkAddProduct->getConversationId());
        $this->assertEquals("AAVSZg", $iyziLinkAddProduct->getToken());
        $this->assertEquals("https://iyzi.link/AAVSZg", $iyziLinkAddProduct->getUrl());
        $this->assertEquals("https://img.iyzi.link/AA/VSZg.jpg", $iyziLinkAddProduct->getImageUrl());
        $this->assertJson($iyziLinkAddProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkAddProduct->getRawResult());
    }
}