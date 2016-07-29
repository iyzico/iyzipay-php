<?php

require_once('config.php');

function retrieve_payout_completed_transactions()
{
    # create request class
    $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setDate("2016-01-22 19:13:00");

    # make request
    $payoutCompletedTransactionList = \Iyzipay\Model\PayoutCompletedTransactionList::retrieve($request, Config::options());

    # print result
    print_r($payoutCompletedTransactionList);
}

function retrieve_bounced_bank_transfers()
{
    # create request class
    $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setDate("2016-01-22 19:13:00");

    # make request
    $bouncedBankTransferList = \Iyzipay\Model\BouncedBankTransferList::retrieve($request, Config::options());

    # print result
    print_r($bouncedBankTransferList);
}