<?php

require dirname(__DIR__) . '/config.php';

function subscriptionList(): void {
    $request = new \Iyzipay\Request\Subscription\SubscriptionListRequest();

    $request->setPage(1);
    $request->setCount(10);
    $request->setSubscriptionStatus(\Iyzipay\Model\Status::ACTIVE);
    $request->setSubscriptionReferenceCode('c8ab43da-f4b3-40d2-b1ef-620da93ec3e9');
    $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');
    $request->setPricingPlanReferenceCode('c1d489b6-9adc-42fa-88ae-47ea2e5dbe1e');
    $request->setParentReferenceCode('f219267d-ce05-4039-a773-225ea44aacd1');
    $request->setStartDate('2024-01-01 23:56:00');
    $request->setEndDate('2024-02-02 23:56:00');

    $result = \Iyzipay\Model\Subscription\SubscriptionList::create($request, Config::options());
    print_r($result);
}

subscriptionList();
