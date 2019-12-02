<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionRetrieveProductRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionRetrieveProductRequestTest extends TestCase
{

    public function test_should_get_json_string()
    {
        $request = $this->prepareRequest();
        $json = '[]';
        $this->assertJson($request->toJsonString());
        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    private function prepareRequest()
    {
        $request = new SubscriptionRetrieveProductRequest();
        $request->setProductReferenceCode("4594ca5c-75f6-425d-a673-2a1d19d534ba");
        return $request;
    }
}
