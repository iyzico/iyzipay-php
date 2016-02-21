<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new ApprovalSample();
$sample->should_approve_payment_item();
$sample->should_disapprove_payment_item();

class ApprovalSample
{
    public function should_approve_payment_item()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("1");

        # make request
        $approval = \Iyzipay\Model\Approval::create($request, Sample::options());

        # print result
        print_r($approval);
    }

    public function should_disapprove_payment_item()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("1");

        # make request
        $disapproval = \Iyzipay\Model\Disapproval::create($request, Sample::options());

        # print result
        print_r($disapproval);
    }
}