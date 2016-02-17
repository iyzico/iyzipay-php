<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new InstallmentSample();
$sample->should_retrieve_installment_info();

class InstallmentSample extends Sample
{
    public function should_retrieve_installment_info()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBinNumber("554960");
        $request->setPrice("1");

        # make request
        $response = Iyzipay\Model\InstallmentInfo::create($request, parent::options());

        # print response
        print_r($response);
    }
}
