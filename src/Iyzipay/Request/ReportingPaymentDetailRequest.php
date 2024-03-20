<?php

namespace Iyzipay\Request;

use Iyzipay\JsonBuilder;
use Iyzipay\Request;

class ReportingPaymentDetailRequest extends Request {
    private string $paymentConversationId;
    private string $paymentId;

    public function getPaymentConversationId(): ?string {
        return $this->paymentConversationId ?? null;
    }

    public function setPaymentConversationId(string $paymentConversationId): void {
        $this->paymentConversationId = $paymentConversationId;
    }

    public function getPaymentId(): ?string {
        return $this->paymentId ?? null;
    }

    public function setPaymentId(string $paymentId): void {
        $this->paymentId = $paymentId;
    }

    public function getJsonObject() {
        return JsonBuilder::fromJsonObject(parent::getJsonObject())
            ->add("paymentConversationId", $this->getPaymentConversationId())
            ->getObject();
    }
}
