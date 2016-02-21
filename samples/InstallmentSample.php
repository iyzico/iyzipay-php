<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new InstallmentSample();
$sample->should_retrieve_installment_info();
$sample->should_retrieve_installment_info_for_all_banks();

class InstallmentSample
{
    public function should_retrieve_installment_info()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("454671");
        $request->setPrice("1");

        # make request
        $installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, Sample::options());

        # print result
        print_r($installmentInfo);
    }

    public function should_retrieve_installment_info_for_all_banks()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");

        # make request
        $installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, Sample::options());

        # print result
        print_r($installmentInfo);
    }
}
