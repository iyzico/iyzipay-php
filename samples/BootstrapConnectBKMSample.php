<?php
require_once('../IyzipayBootstrap.php');

IyzipayBootstrap::init();
class BootstrapConnectBKMSample
{
    public function run() {
        $this->should_initialize_bkm_express();
        $this->should_retrieve_bkm_auth();
    }

    public function should_initialize_bkm_express()
    {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\CreateConnectBKMInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callbackUrl");
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("198.168.123.102");
        $request->setConnectorName("ISBANK");
        $request->setInstallmentDetails($this->prepareInstallmentdetails());

        # make request
        $response = Iyzipay\Model\ConnectBKMInitialize::create($request, $options);

        # print response
        print_r($response);
    }

    public function should_retrieve_bkm_auth() {
        # create client configuration class
        $options = new \Iyzipay\Options();
        $options->setApiKey("api key");
        $options->setSecretKey("secret key");
        $options->setBaseUrl("https://stg.iyzipay.com");

        # create request class
        $request = new \Iyzipay\Request\RetrieveBKMAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("mockToken1453392332672");

        # make request
        $response = Iyzipay\Model\ConnectBKMAuth::retrieve($request, $options);

        # print response
        print_r($response);
    }

    private function prepareInstallmentdetails()
    {
        $installmentDetails = array();
        $installmentDetails[0] = $this->isbankInstallmentDetails();
        $installmentDetails[1] = $this->finansbankInstallmentDetails();
        $installmentDetails[2] = $this->akbankInstallmentDetails();
        $installmentDetails[3] = $this->ykbInstallmentDetails();
        $installmentDetails[4] = $this->denizbankInstallmentDetails();
        $installmentDetails[5] = $this->halkbankInstallmentDetails();
        return $installmentDetails;
    }

    private function isbankInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }

    private function finansbankInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }

    private function akbankInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }

    private function ykbInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }

    private function denizbankInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }

    private function halkbankInstallmentDetails()
    {
        $installmentDetail = new Iyzipay\Model\BKMInstallment();
        $installmentDetail->setBankId(64);
        $installmentPrices = array();

        $singleInstallment = new Iyzipay\Model\BKMInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new Iyzipay\Model\BKMInstallmentPrice();
        $nineInstallments->setInstallmentNumber(9);
        $nineInstallments->setTotalPrice("1.4");

        $installmentPrices[0] = $singleInstallment;
        $installmentPrices[1] = $twoInstallments;
        $installmentPrices[2] = $threeInstallments;
        $installmentPrices[3] = $sixInstallments;
        $installmentPrices[4] = $nineInstallments;

        $installmentDetail->setInstallmentPrices($installmentPrices);
        return $installmentDetail;
    }
}