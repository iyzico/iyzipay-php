<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new BinNumberSample();
$sample->should_retrieve_bin_number();

class BinNumberSample
{
    public function should_retrieve_bin_number()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveBinNumberRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456");
        $request->setBinNumber("454671");

        # make request
        $binNumber = \Iyzipay\Model\BinNumber::retrieve($request, Sample::options());

        # print result
        print_r($binNumber);
    }
}