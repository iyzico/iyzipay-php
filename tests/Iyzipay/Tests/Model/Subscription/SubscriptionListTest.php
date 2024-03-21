<?php

namespace Iyzipay\Tests\Model\Subscription;

use Iyzipay\Request\Subscription\SubscriptionListRequest;
use Iyzipay\Model\Subscription\SubscriptionList;
use Iyzipay\Tests\IyzipayResourceTestCase;

class SubscriptionListTest extends IyzipayResourceTestCase {
    public function testShouldListSubscriptions(): void {
        $request = new SubscriptionListRequest();
        $request->setPage(1);
        $request->setCount(10);
        $request->setSubscriptionStatus(\Iyzipay\Model\Status::ACTIVE);
        $request->setSubscriptionReferenceCode('c8ab43da-f4b3-40d2-b1ef-620da93ec3e9');
        $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');
        $request->setPricingPlanReferenceCode('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e');
        $request->setParentReferenceCode('f219267d-ce05-4039-a773-225ea44aacd1');
        $request->setStartDate('2024-01-01');
        $request->setEndDate('2024-02-02');

        $this->expectHttpGetV2();
        $list = SubscriptionList::create($request, $this->options);
        $this->verifyResource($list);
    }
}
