<?php

namespace Iyzipay\Model;

use Iyzipay\BaseModel;
use Iyzipay\JsonBuilder;
use Iyzipay\RequestStringBuilder;

class Reward extends BaseModel
{
    private $rewardAmount;
    private $rewardUsage;

    public function getRewardAmount()
    {
        return $this->rewardAmount;
    }

    public function setRewardAmount($rewardAmount)
    {
        $this->rewardAmount = $rewardAmount;
    }

    public function getRewardUsage()
    {
        return $this->rewardUsage;
    }

    public function setRewardUsage($rewardUsage)
    {
        $this->rewardUsage = $rewardUsage;
    }

    public function getJsonObject()
    {
        return JsonBuilder::create()
            ->add("rewardAmount", $this->getRewardAmount())
            ->add("rewardUsage", $this->getRewardUsage())
            ->getObject();
    }

    /**
     * @codeCoverageIgnore
     */
    public function toPKIRequestString()
    {
        return RequestStringBuilder::create()
            ->append("rewardAmount", $this->getRewardAmount())
            ->append("rewardUsage", $this->getRewardUsage())
            ->getRequestString();
    }
}