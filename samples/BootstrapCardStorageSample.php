<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();

class BootstrapCardStorageSample
{
    public function run()
    {
        $this->should_create_card();
        $this->should_create_user_and_create_card();
        $this->should_delete_card();
        $this->should_retrieve_cards();
    }

    public function should_create_user_and_create_card()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setEmail("email@email.com");
        $request->setExternalId("external id");
        $request->setCard($this->newCard());

        # make request
        $response = \Iyzipay\Model\Card::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_create_card()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardUserKey("myCardUserKey");
        $request->setCard($this->newCard());

        # make request
        $response = \Iyzipay\Model\Card::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_delete_card()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\DeleteCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("myCardToken");
        $request->setCardUserKey("myCardUserkey");

        # make request
        $response = \Iyzipay\Model\Card::delete($request, $options);

        # print response
        print_r($response);
    }

    public function should_retrieve_cards()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\RetrieveCardListRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setCardUserKey("myCardUserKey");

        # make request
        $response = \Iyzipay\Model\CardList::retrieve($request, $options);

        # print response
        print_r($response);
    }

    private function newCard()
    {
        $cardInformation = new Iyzipay\Model\CardInformation();
        $cardInformation->setCardAlias("myAlias");
        $cardInformation->setCardHolderName("John Doe");
        $cardInformation->setCardNumber("5528790000000008");
        $cardInformation->setExpireMonth("12");
        $cardInformation->setExpireYear("2030");
        return $cardInformation;
    }
}