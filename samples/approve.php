<?php

require_once('config.php');

function approve_payment_item()
{
    # create request class
    $request = new \Iyzipay\Request\CreateApprovalRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setPaymentTransactionId("1");

    # make request
    $approval = \Iyzipay\Model\Approval::create($request, Config::options());

    # print result
    print_r($approval);
}

function disapprove_payment_item()
{
    # create request class
    $request = new \Iyzipay\Request\CreateApprovalRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setPaymentTransactionId("1");

    # make request
    $disapproval = \Iyzipay\Model\Disapproval::create($request, Config::options());

    # print result
    print_r($disapproval);
}