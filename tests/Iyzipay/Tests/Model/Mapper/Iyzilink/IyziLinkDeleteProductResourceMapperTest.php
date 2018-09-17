<?php

namespace Iyzipay\Tests\Model\Mapper\Iyzilink;

use Iyzipay\Model\Mapper\Iyzilink\IyziLinkDeleteProductResourceMapper;
use Iyzipay\Model\Status;
use Iyzipay\Model\Iyzilink\IyziLinkDeleteProduct;
use Iyzipay\Tests\TestCase;

class IyziLinkDeleteProductResourceMapperTest extends TestCase
{
    public function test_should_map_iyzilink_delete_product_resource_mapper_create()
    {
        $json = $this->retrieveJsonFile("iyzilink-delete-product.json");

        $iyziLinkDeleteProduct = IyziLinkDeleteProductResourceMapper::create($json)->jsonDecode()->mapResource(new IyziLinkDeleteProduct());

        $this->assertNotEmpty($iyziLinkDeleteProduct);
        $this->assertEquals(Status::SUCCESS, $iyziLinkDeleteProduct->getStatus());
        $this->assertEquals(1537165387437, $iyziLinkDeleteProduct->getSystemTime());
        $this->assertEquals("123456789", $iyziLinkDeleteProduct->getConversationId());
        $this->assertJson($iyziLinkDeleteProduct->getRawResult());
        $this->assertJsonStringEqualsJsonString($json, $iyziLinkDeleteProduct->getRawResult());
    }
}