<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new ApiTestSample();
$sample->should_test_api();

class ApiTestSample
{
    public function should_test_api()
    {
        $iyzipayResource = \Iyzipay\Model\ApiTest::retrieve(Sample::options());

        # print result
        print_r($iyzipayResource);
    }
}