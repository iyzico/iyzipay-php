<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new CardStorageSample();
$sample->should_create_user_and_add_card();
$sample->should_create_card();
$sample->should_delete_card();
$sample->should_retrieve_cards();

class CardStorageSample
{
    public function should_create_user_and_add_card()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setEmail("email@email.com");
        $request->setExternalId("external id");

        $cardInformation = new \Iyzipay\Model\CardInformation();
        $cardInformation->setCardAlias("card alias");
        $cardInformation->setCardHolderName("John Doe");
        $cardInformation->setCardNumber("5528790000000008");
        $cardInformation->setExpireMonth("12");
        $cardInformation->setExpireYear("2030");
        $request->setCard($cardInformation);

        # make request
        $card = \Iyzipay\Model\Card::create($request, Sample::options());

        # print result
        print_r($card);
    }

    public function should_create_card()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardUserKey("card user key");

        $cardInformation = new \Iyzipay\Model\CardInformation();
        $cardInformation->setCardAlias("card alias");
        $cardInformation->setCardHolderName("John Doe");
        $cardInformation->setCardNumber("5528790000000008");
        $cardInformation->setExpireMonth("12");
        $cardInformation->setExpireYear("2030");
        $request->setCard($cardInformation);

        # make request
        $card = \Iyzipay\Model\Card::create($request, Sample::options());

        # print result
        print_r($card);
    }

    public function should_delete_card()
    {
        # create request class
        $request = new \Iyzipay\Request\DeleteCardRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardToken("card token");
        $request->setCardUserKey("card user key");

        # make request
        $card = \Iyzipay\Model\Card::delete($request, Sample::options());

        # print result
        print_r($card);
    }

    public function should_retrieve_cards()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveCardListRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setCardUserKey("card user key");

        # make request
        $cardList = \Iyzipay\Model\CardList::retrieve($request, Sample::options());

        # print result
        print_r($cardList);
    }
}