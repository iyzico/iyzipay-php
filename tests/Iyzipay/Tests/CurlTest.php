<?php

namespace Iyzipay\Tests;

use Iyzipay\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_exec_curl()
    {
        $curl = new Curl();
        $ret = $curl->exec("url", array(
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false));

        $this->assertNotNull($ret);
        $this->assertFalse($ret);
    }
}