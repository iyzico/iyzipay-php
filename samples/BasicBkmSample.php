<?php
require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new BasicBkmSample();
$sample->should_initialize_bkm_express();
$sample->should_retrieve_bkm_auth();

class BasicBkmSample
{
    public function should_initialize_bkm_express()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateBasicBkmInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setCallbackUrl("https://www.merchant.com/callback");

        # prepare buyer
        $request->setBuyerId("100");
        $request->setBuyerEmail("email@email.com");
        $request->setBuyerIp("85.34.78.112");

        # prepare default pos
        $request->setConnectorName("connector name");
        $request->setInstallmentDetails($this->prepareInstallmentDetails());

        # make request
        $basicBkmInitialize = \Iyzipay\Model\BasicBkmInitialize::create($request, Sample::options());

        # print result
        print_r($basicBkmInitialize);
    }

    public function should_retrieve_bkm_auth()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveBkmRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken("token");

        # make request
        $basicBkm = \Iyzipay\Model\BasicBkm::retrieve($request, Sample::options());

        # print result
        print_r($basicBkm);
    }

    private function prepareInstallmentDetails()
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(64);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(111);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(46);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(67);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(134);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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
        $installmentDetail = new \Iyzipay\Model\BkmInstallment();
        $installmentDetail->setBankId(12);

        $installmentPrices = array();

        $singleInstallment = new \Iyzipay\Model\BkmInstallmentPrice();
        $singleInstallment->setInstallmentNumber(1);
        $singleInstallment->setTotalPrice("1");

        $twoInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $twoInstallments->setInstallmentNumber(2);
        $twoInstallments->setTotalPrice("1.1");

        $threeInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $threeInstallments->setInstallmentNumber(3);
        $threeInstallments->setTotalPrice("1.1");

        $sixInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
        $sixInstallments->setInstallmentNumber(6);
        $sixInstallments->setTotalPrice("1.2");

        $nineInstallments = new \Iyzipay\Model\BkmInstallmentPrice();
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