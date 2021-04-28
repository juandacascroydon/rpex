<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Croydon\Services\Webservice;

/**
 * Description of GenerateOrderString
 *
 * @author joncasasq
 */
class GenerateOrderString
{

    /**
     * @var Model\Order
     */
    protected $order;
    protected $string;

    function __construct(Model\Order $order)
    {
        $this->order = $order;
        $this->string = '';
    }

    /**
     * @param bool $isInvoice
     * @return string
     */
    public function getString(bool $isInvoice = false)
    {
        $this->string = sprintf('"%s"|', $this->order->getUid());
        $this->string = $this->string . sprintf('"%s"|', $this->order->getCia());
        $this->string = $this->string . sprintf('"%s"|', $this->order->getAnio());
        $this->string = $this->string . sprintf('"%s"|', $this->order->getApp());
        $this->string = $this->string . sprintf('%s|', $this->getDetails($isInvoice));
        $this->string = $this->string . sprintf('%s', $this->getItems());
        return $this->string;
    }

    private function getDetails(bool $isInvoice = false): string
    {
        $detail = sprintf('"%s";', $this->order->getDocumentNumber());
        $detail = $detail . sprintf('"%s";', $this->order->getDocumentType());
        $detail = $detail . sprintf('"%s";', $this->order->getBillingNames());
        $detail = $detail . sprintf('"%s";', $this->order->getBillingLastNames());
        $detail = $detail . sprintf('"%s";', $this->order->getEmail());
        $detail = $detail . sprintf('"%s";', $this->order->getAddressInvoice());
        $detail = $detail . sprintf('"%s";', $this->order->getAddressShipping());
        $detail = $detail . sprintf('"%s";', $this->order->getNamesShipping());
        $detail = $detail . sprintf('"%s";', $this->order->getLastNamesShipping());
        $detail = $detail . sprintf('"%s";', $this->order->getCityBilling());
        $detail = $detail . sprintf('"%s";', $this->order->getCityShipping());
        $detail = $detail . sprintf('"%s";', $this->order->getCountry());
        $detail = $detail . sprintf('"%s";', $this->order->getBillingPhone());
        $detail = $detail . sprintf('"%s";', $this->order->getBillingMovilPhone());
        $detail = $detail . sprintf('"%s";', $this->order->getShippingPhone());
        $detail = $detail . sprintf('"%s";', $this->order->getShippingMovilPhone());
        $detail = $detail . sprintf('"%s";', $this->order->getClassCode());
        $detail = $detail . sprintf('"%s";', $this->order->getConditionPayCode());
        $detail = $detail . sprintf('"%s";', $this->order->getDiscountCode());
        $detail = $detail . sprintf('"%s";', $this->getDate());
        $detail = $detail . sprintf('"%s";', $this->order->getPurchaseOrder());
        $detail = $detail . sprintf('"%s";', $this->order->getSubtotal());
        $detail = $detail . sprintf('"%s";', $this->getSubtotalShipping());
        $detail = $detail . sprintf('"%s";', $this->order->getTotalAmount());
        $detail = $detail . sprintf('"%s";', $this->getTaxes());
        $detail = $detail . sprintf('"%s";', $this->getDiscountTotal());
        if (!$isInvoice) {
            $detail = $detail . sprintf('"%s"', $this->order->getGrandTotal());
        } else {
            $detail = $detail . sprintf('"%s";', $this->order->getGrandTotal());
            $detail = $detail . sprintf('"%s"', $this->order->getOrderNumber());
        }
        return $detail;
    }

    private function getSubtotalShipping()
    {
        if ($this->order->getShippingValue() > 0) {
            return sprintf('%s', $this->order->getShippingValue());
        }
        return ' ';
    }

    private function getDate()
    {
        return date('Ymd');
    }

    private function getTaxes()
    {
        $result = $this->order->getTaxAmount() > 0 ? $this->order->getTaxAmount() : 0;
        return sprintf('%s', $result);
    }

    private function getDiscountTotal()
    {
        if ($this->order->getDiscountTotal() > 0) {
            return sprintf('%s', $this->order->getDiscountTotal());
        }
        return ' ';
    }

    private function getItems(): string
    {
        $items = [];
        foreach ($this->order->getItems() as $product) {
            $item = sprintf('"%s";', $product->getSku());
            $item = $item . sprintf('"%s";', $product->getUnitPrice());
            $item = $item . sprintf('"%s";', $product->getQty());
            $item = $item . sprintf('"%s"', $product->getTaxCode());
            $items[] = $item;
        }
        return implode('|', $items);
    }

}
