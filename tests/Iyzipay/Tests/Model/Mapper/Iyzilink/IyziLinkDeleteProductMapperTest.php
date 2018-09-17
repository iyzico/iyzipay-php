<?php

namespace Iyzipay\Tests\Model\Mapper;

use Iyzipay\Model\Locale;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkDeleteProduct;
use Iyzipay\Model\Mapper\Iyzilink\IyziLinkDeleteProductMapper;
use Iyzipay\Tests\TestCase;

class IyziLinkDeleteProductMapperTest extends TestCase
{
    public function test_should_map_iyzilink_delete_product_mapper_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-delete-product.json");

        $iyziLinkDeleteProduct = IyziLinkDeleteProductMapper::create($json)->jsonDecode()->mapIyziLinkDeleteProduct(new IyziLinkDeleteProduct());

        $this->assertNotEmpty($iyziLinkDeleteProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkDeleteProduct->getStatus());
        $this->assertEquals(Locale::TR, $iyziLinkDeleteProduct->getLocale());
        $this->assertEquals(1537165387437, $iyziLinkDeleteProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkDeleteProduct->getConversationId());
        $this->assertJson($iyziLinkDeleteProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkDeleteProduct->getRawResult());
    }
}