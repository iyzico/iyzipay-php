<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetriveProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkRetriveProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkRetriveProductResourceMapperTest extends TestCase
{
    public function test_should_map_iyzilink_retrive_mapper_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-retrive-product.json");

        $iyziLinkRetriveProduct = IyziLinkRetriveProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkRetriveProduct());
        
        $this->assertNotEmpty($iyziLinkRetriveProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkRetriveProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkRetriveProduct->getLocale());
        $this->assertEquals(1537171364727, $iyziLinkRetriveProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkRetriveProduct->getConversationId());
        $this->assertJson($iyziLinkRetriveProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkRetriveProduct->getRawResult());
    }
}