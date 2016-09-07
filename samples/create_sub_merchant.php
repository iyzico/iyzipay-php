<?php

require_once('config.php');

function create_personal_sub_merchant()
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
    $request->setIdentityNumber("31300864726");
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Config::options());

    # print result
    print_r($subMerchant);
}

function create_private_sub_merchant()
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
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Config::options());

    # print result
    print_r($subMerchant);
}

function create_limited_company_sub_merchant()
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
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, Config::options());

    # print result
    print_r($subMerchant);
}