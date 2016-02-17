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
        $response = ApiTest::retrieve(parent::options());

        #print response
        print_r($response);
    }
}