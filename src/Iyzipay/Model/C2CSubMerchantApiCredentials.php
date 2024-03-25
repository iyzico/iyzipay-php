<?php

namespace Iyzipay\Model;

class C2CSubMerchantApiCredentials {
    private string $salt;
    private string $secretKey;

    public function getSalt(): ?string {
        return $this->salt ?? null;
    }

    public function setSalt(string $salt): void {
        $this->salt = $salt;
    }

    public function getSecretKey(): ?string {
        return $this->secretKey ?? null;
    }

    public function setSecretKey(string $secretKey): void {
        $this->secretKey = $secretKey;
    }
}
