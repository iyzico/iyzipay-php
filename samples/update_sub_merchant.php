<?php

require_once('config.php');

function update_personal_sub_merchant()
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
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());

    # print result
    print_r($subMerchant);
}

function update_private_sub_merchant()
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
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());

    # print result
    print_r($subMerchant);
}

function update_limited_company_sub_merchant()
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
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());

    # print result
    print_r($subMerchant);
}