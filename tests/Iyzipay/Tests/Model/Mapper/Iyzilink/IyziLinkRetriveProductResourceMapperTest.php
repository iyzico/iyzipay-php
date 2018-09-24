<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetrieveProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkRetrieveProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkRetriveProductResourceMapperTest extends TestCase
{
    public function test_should_map_iyzilink_retrieve_mapper_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-retrieve-product.json");

        $iyziLinkRetriveProduct = IyziLinkRetrieveProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkRetrieveProduct());

        $this->assertNotEmpty($iyziLinkRetriveProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkRetriveProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkRetriveProduct->getLocale());
        $this->assertEquals(1537171364727, $iyziLinkRetriveProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkRetriveProduct->getConversationId());
        $this->assertEquals(null, $iyziLinkRetriveProduct->getItem());
        $this->assertEquals(null, $iyziLinkRetriveProduct->getErrorCode());
        $this->assertEquals(null, $iyziLinkRetriveProduct->getErrorMessage());
        $this->assertEquals(null, $iyziLinkRetriveProduct->getErrorGroup());
        $this->assertJson($iyziLinkRetriveProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkRetriveProduct->getRawResult());
    }
}