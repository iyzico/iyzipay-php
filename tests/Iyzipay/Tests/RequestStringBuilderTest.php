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
}