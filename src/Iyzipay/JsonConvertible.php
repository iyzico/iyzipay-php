<?php

namespace Iyzipay;

interface JsonConvertible
{
    public function getJsonObject();

    public function toJsonString();
}