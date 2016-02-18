<?php

require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new ApprovalSample();
$sample->should_approve_payment_item();
$sample->should_disapprove_payment_item();

class ApprovalSample extends Sample
{
    public function should_approve_payment_item()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("2");

        # make request
        $approval = \Iyzipay\Model\Approval::create($request, parent::options());

        # print result
        print_r($approval);
    }

    public function should_disapprove_payment_item()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateApprovalRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPaymentTransactionId("2");

        # make request
        $disapproval = \Iyzipay\Model\Disapproval::create($request, parent::options());

        # print result
        print_r($disapproval);
    }
}
