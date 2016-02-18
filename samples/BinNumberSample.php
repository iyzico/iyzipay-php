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
        $request->setConversationId("123456789");
        $request->setBinNumber("554960");

        # make request
        $binNumber = \Iyzipay\Model\BinNumber::retrieve($request, Sample::options());

        # print result
        print_r($binNumber);
    }
}
