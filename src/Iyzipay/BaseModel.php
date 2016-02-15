<?php

namespace Iyzipay;

abstract class BaseModel implements JsonConvertible, RequestStringConvertible
{
    public function toJsonString()
    {
        return JsonBuilder::jsonEncode($this->getJsonObject());
    }
}