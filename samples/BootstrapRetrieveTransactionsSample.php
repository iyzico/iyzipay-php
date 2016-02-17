<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

$sample = new RetrieveTransactionsSample();
$sample->should_retrieve_payout_completed_transactions();
$sample->should_retrieve_bounced_bank_transfers();

class RetrieveTransactionsSample extends Sample
{
    public function should_retrieve_payout_completed_transactions()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $response = Iyzipay\Model\PayoutCompletedTransactionList::create($request, parent::options());

        # print response
        print_r($response);
    }

    public function should_retrieve_bounced_bank_transfers()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $response = Iyzipay\Model\BouncedBankTransferList::retrieve($request, parent::options());

        # print response
        print_r($response);
    }
}