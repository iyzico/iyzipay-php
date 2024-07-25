<?php

require dirname(__DIR__) . '/config.php';

function deleteSubscriptionCustomer(): void {
    $request = new \Iyzipay\Request\Subscription\SubscriptionDeleteCustomerRequest();
    $request->setCustomerReferenceCode('566b2e1a-5046-4438-9b62-c8cf761f61d1');
    $result = \Iyzipay\Model\Subscription\SubscriptionDeleteCustomer::delete($request, Config::options());
    print_r($result);
}

deleteSubscriptionCustomer();
