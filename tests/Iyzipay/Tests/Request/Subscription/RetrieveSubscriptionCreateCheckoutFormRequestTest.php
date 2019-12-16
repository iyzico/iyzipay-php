<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\RetrieveSubscriptionCreateCheckoutFormRequest;
use Iyzipay\Tests\TestCase;

class RetrieveSubscriptionCreateCheckoutFormRequestTest extends TestCase
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
        $request = new RetrieveSubscriptionCreateCheckoutFormRequest();
        $request->setCheckoutFormToken("817ff890-424c-4e15-b190-d178834750cc");
        return $request;
    }
}
