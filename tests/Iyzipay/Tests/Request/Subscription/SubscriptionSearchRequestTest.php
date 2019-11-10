<?php

namespace Iyzipay\Tests\Request\Subscription;

use Iyzipay\Request\Subscription\SubscriptionSearchRequest;
use Iyzipay\Tests\TestCase;

class SubscriptionSearchRequestTest extends TestCase
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
        $request = new SubscriptionSearchRequest();
        $request->setPage(1);
        $request->setCount(10);
        $request->setSubscriptionStatus('ACTIVE');
        $request->setStartDate('2018-10-05');
        $request->setEndDate('2019-10-05');
        $request->setPricingPlanReferenceCode('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e');
        return $request;
    }
}
