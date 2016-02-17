<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class ConnectPaymentAuthSample
{
    public function run() {
        $this->should_pay_with_card();
        $this->should_pay_with_card_token();
    }

    public function should_pay_with_card() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateConnectPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("127.0.0.1");
        $request->setConnectorName("ISBANK");
        $request->setInstallment(1);
        $request->setPaidPrice("1.0");
        $request->setPrice("1.0");
        $request->setPaymentCard($this->newPaymentCard());

        # make request
        $response = Iyzipay\Model\ConnectPaymentAuth::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_pay_with_card_token() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateConnectPaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerId("B2323");
        $request->setBuyerIp("127.0.0.1");
        $request->setConnectorName("ISBANK");
        $request->setInstallment(1);
        $request->setPaidPrice("1.0");
        $request->setPrice("1.0");

        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardToken("cardToken");
        $paymentCard->setCardUserKey("cardUserKey");
        $request->setPaymentCard($paymentCard);

        # make request
        $response = Iyzipay\Model\ConnectPaymentAuth::create($request, $options);

        # print response
        print_r($response);
    }

    private function newPaymentCard()
    {
        $paymentCard = new Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName("John Doe");
        $paymentCard->setCardNumber("5528790000000008");
        $paymentCard->setExpireMonth("12");
        $paymentCard->setExpireYear("2030");
        $paymentCard->setCvc("212");
        $paymentCard->setRegisterCard(0);
        return $paymentCard;
    }
}