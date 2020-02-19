<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Locale;
use Iyzipay\RequestStringBuilder;
use Iyzipay\Request;

class RequestStringBuilderTest extends TestCase
{
    public function test_should_request_string_query()
    {
        $request = new Request();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, null);

        $this->assertEquals("?conversationId=123456789&locale=tr", $result);
    }

    public function test_should_request_string_query_pages()
    {
        $request = new \Iyzipay\Request\PagininRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPage(1);
        $request->setCount(2);
        $result = RequestStringBuilder::requestToStringQuery($request, 'pages');

        $this->assertEquals("?conversationId=123456789&locale=tr&page=1&count=2", $result);
    }

    public function test_should_request_string_query_reporting()
    {
        $request = new \Iyzipay\Request\ReportingPaymentDetailRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentConversationId('123456789');
        $result = RequestStringBuilder::requestToStringQuery($request, 'reporting');

        $this->assertEquals("?conversationId=123456789&locale=tr?paymentConversationId=123456789", $result);
    }

    public function test_should_request_string_query_reporting_transaction()
    {
        $request = new \Iyzipay\Request\ReportingPaymentTransactionRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $request->setTransactionDate('2018-10-10');
        $request->setPage(1);
        $result = RequestStringBuilder::requestToStringQuery($request, 'reportingTransaction');

        $this->assertEquals("?conversationId=123456789&locale=tr&transactionDate=2018-10-10&page=1", $result);
    }

    public function test_should_request_string_query_subscription_search()
    {
        $request = new \Iyzipay\Request\Subscription\SubscriptionSearchRequest();
        $request->setPage(1);
        $request->setCount(10);
        $request->setSubscriptionStatus('ACTIVE');
        $request->setStartDate('2018-10-05');
        $request->setEndDate('2019-10-05');
        $request->setPricingPlanReferenceCode('c1d489b6');
        $request->setCustomerReferenceCode('1234');
        $request->setParentReferenceCode('9876');
        $request->setSubscriptionReferenceCode('3579');
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, 'searchSubscription');

        $this->assertEquals("?page=1&count=10&subscriptionReferenceCode=3579&parentReferenceCode=9876&customerReferenceCode=1234&pricingPlanReferenceCode=c1d489b6&subscriptionStatus=ACTIVE&startDate=2018-10-05&endDate=2019-10-05&conversationId=123456789&locale=tr", $result);
    }

    public function test_should_request_string_query_subscription_item()
    {
        $request = new \Iyzipay\Request\Subscription\SubscriptionListProductsRequest();
        $request->setPage(1);
        $request->setCount(10);
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, 'subscriptionItems');

        $this->assertEquals("?page=1&count=10&conversationId=123456789&locale=tr", $result);
    }

    public function test_should_request_string_query_subscription_default_params()
    {
        $request = new \Iyzipay\Request\Subscription\SubscriptionRetrieveCustomerRequest();
        $request->setCustomerReferenceCode("xyzq");
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, 'defaultParams');

        $this->assertEquals("?conversationId=123456789&locale=tr", $result);
    }
    public function test_should_request_string_query_subscription_default_params_conversation_id()
    {
        $request = new \Iyzipay\Request\Subscription\SubscriptionRetrieveProductRequest();
        $request->setConversationId("123456789");
        $result = RequestStringBuilder::requestToStringQuery($request, 'defaultParams');

        $this->assertEquals("?conversationId=123456789", $result);
    }

    public function test_should_request_string_query_subscription_default_params_locale()
    {
        $request = new \Iyzipay\Request\Subscription\SubscriptionRetrievePricingPlanRequest();
        $request->setLocale(Locale::TR);
        $result = RequestStringBuilder::requestToStringQuery($request, 'defaultParams');

        $this->assertEquals("?locale=tr", $result);
    }
}