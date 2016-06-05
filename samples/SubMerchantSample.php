<?php

require_once('../IyzipayBootstrap.php');
require_once('Sample.php');

IyzipayBootstrap::init();

$sample = new SubMerchantSample;
$sample->should_create_personal_sub_merchant();

class SubMerchantSample
{
    public function should_create_personal_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("B49224");
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PERSONAL);
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setContactName("John");
        $request->setContactSurname("Doe");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("John's market");
        $request->setIban("TR180006200119000006672315");
        $request->setIdentityNumber("1234567890");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_create_private_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("S49222");
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PRIVATE_COMPANY);
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setTaxOffice("Tax office");
        $request->setLegalCompanyTitle("John Doe inc");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("John's market");
        $request->setIban("TR180006200119000006672315");
        $request->setIdentityNumber("31300864726");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_create_limited_company_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("AS49224");
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::LIMITED_OR_JOINT_STOCK_COMPANY);
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setTaxOffice("Tax office");
        $request->setTaxNumber("9261877");
        $request->setLegalCompanyTitle("XYZ inc");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("John's market");
        $request->setIban("TR180006200119000006672315");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_update_personal_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantKey("sub merchant key");
        $request->setIban("TR630006200027700006678204");
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setContactName("Jane");
        $request->setContactSurname("Doe");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("Jane's market");
        $request->setIdentityNumber("31300864726");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_update_private_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantKey("sub merchant key");
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setTaxOffice("Tax office");
        $request->setLegalCompanyTitle("Jane Doe inc");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("Jane's market");
        $request->setIban("TR180006200119000006672315");
        $request->setIdentityNumber("31300864726");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_update_limited_company_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantKey("sub merchant key");
        $request->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setTaxOffice("Tax office");
        $request->setTaxNumber("9261877");
        $request->setLegalCompanyTitle("ABC inc");
        $request->setEmail("email@submerchantemail.com");
        $request->setGsmNumber("+905350000000");
        $request->setName("Jane's market");
        $request->setIban("TR180006200119000006672315");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Sample::options());

        # print result
        print_r($subMerchant);
    }

    public function should_retrieve_sub_merchant()
    {
        # create request class
        $request = new \Iyzipay\Request\RetrieveSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId("AS49224");

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::retrieve($request, Sample::options());

        # print result
        print_r($subMerchant);
    }
}