<?php

namespace Iyzipay\Tests;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PayWithIyzicoWidgetBankPlan;
use Iyzipay\Model\PayWithIyzicoWidgetBasketItem;
use Iyzipay\Model\PayWithIyzicoWidgetInitialize;
use Iyzipay\Model\PayWithIyzicoWidgetMonthlyPayment;
use Iyzipay\Model\PayWithIyzicoWidgetPaymentPlan;
use Iyzipay\Model\PayWithIyzicoWidgetPaymentPlanDetail;
use Iyzipay\Request\CreatePayWithIyzicoWidgetInitializeRequest;
use Iyzipay\Request\RetrievePayWithIyzicoWidgetPaymentPlanRequest;

class PayWithIyzicoWidgetTest extends IyzipayResourceTestCase
{
    public function test_should_build_initialize_request_json()
    {
        $request = $this->initializeRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456",
                "price":"1500.0",
                "currency":"TRY",
                "installment":6,
                "basketItems":[
                    {"price":"1000.0","name":"Laptop","category":"PC"},
                    {"price":"500.0","name":"Mouse","category":"Others"}
                ]
            }';

        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
    }

    public function test_should_build_initialize_request_pki_string()
    {
        $request = $this->initializeRequest();

        $str = "[locale=tr,conversationId=123456,price=1500.0,currency=TRY,installment=6," .
            "basketItems=[[price=1000.0,name=Laptop,category=PC], [price=500.0,name=Mouse,category=Others]]]";

        $this->assertEquals($str, $request->toPKIRequestString());
    }

    public function test_should_omit_installment_when_not_set()
    {
        $request = $this->initializeRequest();
        $request->setInstallment(null);

        $this->assertArrayNotHasKey("installment", $request->getJsonObject());
    }

    public function test_should_initialize_widget()
    {
        $this->json = '
            {
                "status":"success",
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "widgetToken":"widget-token",
                "widgetContent":"<div id=\"pwi-widget\"></div>"
            }';

        $this->httpClient->expects($this->once())
            ->method("post")
            ->with(
                $this->equalTo("baseUrl/v1/pay-with-iyzico/widget/init"),
                $this->anything(),
                $this->anything()
            )
            ->willReturn($this->json);

        $initialize = PayWithIyzicoWidgetInitialize::create($this->initializeRequest(), $this->options);

        $this->verifyResource($initialize);
        $this->assertEquals("widget-token", $initialize->getWidgetToken());
        $this->assertEquals('<div id="pwi-widget"></div>', $initialize->getWidgetContent());
    }

    public function test_should_build_payment_plan_request_json()
    {
        $request = $this->paymentPlanRequest();

        $json = '
            {
                "locale":"tr",
                "conversationId":"123456",
                "widgetToken":"widget-token"
            }';

        $this->assertJsonStringEqualsJsonString($json, $request->toJsonString());
        $this->assertEquals("[locale=tr,conversationId=123456,widgetToken=widget-token]", $request->toPKIRequestString());
    }

    public function test_should_retrieve_payment_plan()
    {
        $this->json = '
            {
                "status":"success",
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "filteredPlans":[
                    {
                        "bankId":1,
                        "bankName":"Bank",
                        "bankLogoUrl":"https://example.com/bank-logo.png",
                        "existingCustomer":false,
                        "monthlyPayments":[
                            {
                                "productType":"CONSUMER_LOAN",
                                "paymentPlans":[
                                    {
                                        "term":3,
                                        "interestRate":1.25,
                                        "amount":520.0,
                                        "totalPaymentAmount":1560.0,
                                        "annualEffectiveInterestRate":16.08,
                                        "monthlyEffectiveInterestRate":1.25
                                    }
                                ],
                                "campaigns":[]
                            }
                        ]
                    }
                ]
            }';

        $this->httpClient->expects($this->once())
            ->method("post")
            ->with(
                $this->equalTo("baseUrl/v1/pay-with-iyzico/widget/credit/payment-plan"),
                $this->anything(),
                $this->anything()
            )
            ->willReturn($this->json);

        $paymentPlan = PayWithIyzicoWidgetPaymentPlan::retrieve($this->paymentPlanRequest(), $this->options);

        $this->verifyResource($paymentPlan);

        $filteredPlans = $paymentPlan->getFilteredPlans();
        $this->assertCount(1, $filteredPlans);

        $bankPlan = $filteredPlans[0];
        $this->assertInstanceOf(PayWithIyzicoWidgetBankPlan::class, $bankPlan);
        $this->assertEquals(1, $bankPlan->getBankId());
        $this->assertEquals("Bank", $bankPlan->getBankName());
        $this->assertEquals("https://example.com/bank-logo.png", $bankPlan->getBankLogoUrl());
        $this->assertFalse($bankPlan->getExistingCustomer());

        $monthlyPayment = $bankPlan->getMonthlyPayments()[0];
        $this->assertInstanceOf(PayWithIyzicoWidgetMonthlyPayment::class, $monthlyPayment);
        $this->assertEquals("CONSUMER_LOAN", $monthlyPayment->getProductType());
        $this->assertSame(array(), $monthlyPayment->getCampaigns());

        $detail = $monthlyPayment->getPaymentPlans()[0];
        $this->assertInstanceOf(PayWithIyzicoWidgetPaymentPlanDetail::class, $detail);
        $this->assertEquals(3, $detail->getTerm());
        $this->assertEquals(1.25, $detail->getInterestRate());
        $this->assertEquals(520.0, $detail->getAmount());
        $this->assertEquals(1560.0, $detail->getTotalPaymentAmount());
        $this->assertEquals(16.08, $detail->getAnnualEffectiveInterestRate());
        $this->assertEquals(1.25, $detail->getMonthlyEffectiveInterestRate());
    }

    public function test_should_retrieve_empty_payment_plan()
    {
        $this->json = '
            {
                "status":"success",
                "locale":"tr",
                "systemTime":"1458545234852",
                "conversationId":"123456",
                "filteredPlans":[]
            }';

        $this->expectHttpPost();

        $paymentPlan = PayWithIyzicoWidgetPaymentPlan::retrieve($this->paymentPlanRequest(), $this->options);

        $this->verifyResource($paymentPlan);
        $this->assertSame(array(), $paymentPlan->getFilteredPlans());
    }

    private function initializeRequest()
    {
        $request = new CreatePayWithIyzicoWidgetInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setPrice("1500.00");
        $request->setCurrency(Currency::TL);
        $request->setInstallment(6);

        $laptop = new PayWithIyzicoWidgetBasketItem();
        $laptop->setPrice("1000.00");
        $laptop->setName("Laptop");
        $laptop->setCategory("PC");

        $mouse = new PayWithIyzicoWidgetBasketItem();
        $mouse->setPrice("500.00");
        $mouse->setName("Mouse");
        $mouse->setCategory("Others");

        $request->setBasketItems(array($laptop, $mouse));

        return $request;
    }

    private function paymentPlanRequest()
    {
        $request = new RetrievePayWithIyzicoWidgetPaymentPlanRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("123456");
        $request->setWidgetToken("widget-token");

        return $request;
    }
}
