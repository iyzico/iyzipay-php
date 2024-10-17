<?php

namespace Iyzipay;

class RequestStringBuilder
{
    private $requestString;

    function __construct($requestString)
    {
        $this->requestString = $requestString;
    }

    public static function create()
    {
        return new RequestStringBuilder("");
    }

    /**
     * @param $superRequestString
     * @return RequestStringBuilder
     */
    public function appendSuper($superRequestString)
    {
        if (isset($superRequestString)) {
            $superRequestString = substr($superRequestString, 1);
            $superRequestString = substr($superRequestString, 0, -1);

            if (strlen($superRequestString) > 0) {
                $this->requestString = $this->requestString . $superRequestString . ",";
            }
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    public function append($key, $value = null)
    {
        if (isset($value)) {
            if ($value instanceof RequestStringConvertible) {
                $this->appendKeyValue($key, $value->toPKIRequestString());
            } else {
                $this->appendKeyValue($key, $value);
            }
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    public function appendPrice($key, $value = null)
    {
        if (isset($value)) {
            $this->appendKeyValue($key, RequestFormatter::formatPrice($value));
        }
        return $this;
    }

    /**
     * @param $key
     * @param array $array
     * @return RequestStringBuilder
     */
    public function appendArray($key, array $array = null)
    {
        if (isset($array)) {
            $appendedValue = "";
            foreach ($array as $value) {
                if ($value instanceof RequestStringConvertible) {
                    $appendedValue = $appendedValue . $value->toPKIRequestString();
                } else {
                    $appendedValue = $appendedValue . $value;
                }
                $appendedValue = $appendedValue . ", ";
            }
            $this->appendKeyValueArray($key, $appendedValue);
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    private function appendKeyValue($key, $value)
    {
        if (isset($value)) {
            $this->requestString = $this->requestString . $key . "=" . $value . ",";
        }
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return RequestStringBuilder
     */
    private function appendKeyValueArray($key, $value)
    {
        if (isset($value)) {
            $value = substr($value, 0, -2);
            $this->requestString = $this->requestString . $key . "=[" . $value . "],";
        }
        return $this;
    }

    /**
     * @return RequestStringBuilder
     */
    private function appendPrefix()
    {
        $this->requestString = "[" . $this->requestString . "]";
        return $this;
    }

    /**
     * @return RequestStringBuilder
     */
    private function removeTrailingComma()
    {
        $this->requestString = substr($this->requestString, 0, -1);
        return $this;
    }

    public function getRequestString()
    {
        $this->removeTrailingComma();
        $this->appendPrefix();
        return $this->requestString;
    }

    public static function requestToStringQuery(Request $request, $type = null)
    {
        $stringQuery = false;

        if($request->getConversationId()) {
            $stringQuery = "?conversationId=" . $request->getConversationId();
        }

        if($request->getLocale()) {
            $stringQuery .= "&locale=" . $request->getLocale();
        }

        if ($type == 'locale') {
            $stringQuery = "?locale=" . $request->getLocale();
        }

        if($type == 'defaultParams' ) {
            if($request->getConversationId()) {
                $stringQuery = "?conversationId=" . $request->getConversationId();
                $stringQuery .= ($request->getLocale()) ? ("&locale=" . $request->getLocale()) : '';
            }else{
                $stringQuery = ($request->getLocale()) ? ("?locale=" . $request->getLocale()) : '';
            }
        }

        if($type == 'reporting') {
            if($request->getPaymentConversationId()) {
                $stringQuery .= "?paymentConversationId=" . $request->getPaymentConversationId();
            }
            if($request->getPaymentId()) {
                $stringQuery .= "?paymentId=" . $request->getPaymentId();
            }
        }

        if($type == 'reportingTransaction') {

            if($request->getTransactionDate()) {
                $stringQuery .= "&transactionDate=" . $request->getTransactionDate();
            }
            if ($request->getPage()) {
                $stringQuery .= "&page=" . $request->getPage();
            }
        }

        if($type == 'reportingScrollTransaction') {
            if($request->getDocumentScrollVoSortingOrder()) {
                $stringQuery = '?documentScrollVoSortingOrder=' . $request->getDocumentScrollVoSortingOrder();
            }

            if($request->getTransactionDate()) {
                $stringQuery .= "&transactionDate=" . $request->getTransactionDate();
            }

            if($request->getLastId()) {
                $stringQuery .= '&lastId=' . $request->getLastId();
            }
        }

        if($type == 'subscriptionItems' ) {
            if ($request->getPage()) {
                $stringQuery = "?page=" . $request->getPage();
            }
            if ($request->getCount()) {
                $stringQuery .= "&count=" . $request->getCount();
            }
            if($request->getConversationId()) {
                $stringQuery .= "&conversationId=" . $request->getConversationId();
            }
            if($request->getLocale()) {
                $stringQuery .= "&locale=" . $request->getLocale();
            }
        }

        if($type == 'searchSubscription') {
            if($request->getPage()){
                $stringQuery = "?page=".$request->getPage();
            }
            if($request->getCount()){
                $stringQuery .= "&count=".$request->getCount();
            }
            if($request->getSubscriptionReferenceCode()){
                $stringQuery .= "&subscriptionReferenceCode=".$request->getSubscriptionReferenceCode();
            }
            if($request->getParentReferenceCode()){
                $stringQuery .= "&parentReferenceCode=".$request->getParentReferenceCode();
            }
            if($request->getCustomerReferenceCode()){
                $stringQuery .= "&customerReferenceCode=".$request->getCustomerReferenceCode();
            }
            if($request->getPricingPlanReferenceCode()){
                $stringQuery .= "&pricingPlanReferenceCode=".$request->getPricingPlanReferenceCode();
            }
            if($request->getSubscriptionStatus()){
                $stringQuery .= "&subscriptionStatus=".$request->getSubscriptionStatus();
            }
            if($request->getStartDate()){
                $stringQuery .= "&startDate=".$request->getStartDate();
            }
            if($request->getEndDate()){
                $stringQuery .= "&endDate=".$request->getEndDate();
            }
            if($request->getConversationId()) {
                $stringQuery .= "&conversationId=" . $request->getConversationId();
            }
            if($request->getLocale()) {
                $stringQuery .= "&locale=" . $request->getLocale();
            }
        }

        if($type == 'pages') {
            if ($request->getPage()) {
                $stringQuery .= "&page=" . $request->getPage();
            }
            if ($request->getCount()) {
                $stringQuery .= "&count=" . $request->getCount();
            }
        }

        return $stringQuery;
    }
}
