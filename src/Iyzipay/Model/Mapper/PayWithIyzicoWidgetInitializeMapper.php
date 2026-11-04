<?php

namespace Iyzipay\Model\Mapper;

use Iyzipay\Model\PayWithIyzicoWidgetInitialize;

class PayWithIyzicoWidgetInitializeMapper extends IyzipayResourceMapper
{
    public static function create($rawResult = null)
    {
        return new PayWithIyzicoWidgetInitializeMapper($rawResult);
    }

    public function mapPayWithIyzicoWidgetInitializeFrom(PayWithIyzicoWidgetInitialize $initialize, $jsonObject)
    {
        parent::mapResourceFrom($initialize, $jsonObject);

        if (isset($jsonObject->widgetToken)) {
            $initialize->setWidgetToken($jsonObject->widgetToken);
        }
        if (isset($jsonObject->widgetContent)) {
            $initialize->setWidgetContent($jsonObject->widgetContent);
        }
        return $initialize;
    }

    public function mapPayWithIyzicoWidgetInitialize(PayWithIyzicoWidgetInitialize $initialize)
    {
        return $this->mapPayWithIyzicoWidgetInitializeFrom($initialize, $this->jsonObject);
    }
}
