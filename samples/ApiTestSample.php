<?php

use Iyzipay\Model\ApiTest;

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ApiTestSample();
$sample->should_test_api();

class ApiTestSample extends Sample
{
    public function should_test_api()
    {
        # create request class
        $iyzipayResource = ApiTest::retrieve(parent::options());

        #print result
        print_r($iyzipayResource);
    }
}