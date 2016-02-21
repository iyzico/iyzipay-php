<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new RetrieveTransactionsSample();
$sample->should_retrieve_payout_completed_transactions();
$sample->should_retrieve_bounced_bank_transfers();

class RetrieveTransactionsSample
{
    public function should_retrieve_payout_completed_transactions()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $payoutCompletedTransactionList = \Iyzipay\Model\PayoutCompletedTransactionList::retrieve($request, Sample::options());

        # print result
        print_r($payoutCompletedTransactionList);
    }

    public function should_retrieve_bounced_bank_transfers()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $bouncedBankTransferList = \Iyzipay\Model\BouncedBankTransferList::retrieve($request, Sample::options());

        # print result
        print_r($bouncedBankTransferList);
    }
}