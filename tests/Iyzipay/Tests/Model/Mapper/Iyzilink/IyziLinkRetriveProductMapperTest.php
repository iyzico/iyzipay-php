<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkRetrieveProductMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkRetrieveProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkRetriveProductMapperTest extends TestCase
{
    public function test_should_map_iyzilink_retrieve_product_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-retrieve-product.json");

        $iyziLinkRetriveProduct = IyziLinkRetrieveProductMapper::create($json)->jsonDecode()->mapIyziLinkRetriveProduct(new IyziLinkRetrieveProduct());


        $this->assertNotEmpty($iyziLinkRetriveProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkRetriveProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkRetriveProduct->getLocale());
        $this->assertEquals(1537171364727, $iyziLinkRetriveProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkRetriveProduct->getConversationId());
        $this->assertEquals("item", $iyziLinkRetriveProduct->getItem());
        $this->assertJson($iyziLinkRetriveProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkRetriveProduct->getRawResult());
    }
}