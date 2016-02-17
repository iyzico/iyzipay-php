<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class BootstrapRetrieveTransactionsSample
{
    public function run()
    {
        $this->should_retrieve_bounced_bank_transfers();
        $this->should_retrieve_payout_completed_transactions();
    }

    public function should_retrieve_payout_completed_transactions()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $response = Iyzipay\Model\PayoutCompletedTransactionList::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_retrieve_bounced_bank_transfers()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\RetrieveTransactionsRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setDate("2016-01-22 19:13:00");

        # make request
        $response = Iyzipay\Model\BouncedBankTransferList::retrieve($request, $options);

        # print response
        print_r($response);
    }
}