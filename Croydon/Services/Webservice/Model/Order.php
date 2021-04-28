<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Croydon\Services\Webservice\Model;

/**
 * Description of Order
 *
 * @author joncasasq
 */
class Order
{

    /** @var string */
    private $uid;
    /** @var string */
    private $cia;
    /** @var string */
    private $anio;
    /** @var string */
    private $app;
    /** @var string */
    private $documentNumber;
    /** @var string */
    private $documentType;
    /** @var string */
    private $billingNames;
    /** @var string */
    private $billingLastNames;
    /** @var string */
    private $email;
    /** @var string */
    private $addressInvoice;
    /** @var string */
    private $addressShipping;
    /** @var string */
    private $namesShipping;
    /** @var string */
    private $lastNamesShipping;
    /** @var string */
    private $cityBilling;
    /** @var string */
    private $cityShipping;
    /** @var string */
    private $country;
    /** @var string */
    private $billingPhone;
    /** @var string */
    private $billingMovilPhone;
    /** @var string */
    private $shippingPhone;
    /** @var string */
    private $shippingMovilPhone;
    /** @var string */
    private $classCode;
    /** @var string */
    private $conditionPayCode;
    /** @var string */
    private $discountCode;
    /** @var string */
    private $documentDate;
    /** @var string */
    private $purchaseOrder;
    /** @var int */
    private $subtotal;
    /** @var int */
    private $totalAmount;
    /** @var int */
    private $shippingValue;
    /** @var int */
    private $taxAmount;
    /** @var int */
    private $discountTotal;
    /** @var int */
    private $grandTotal;
    /** @var string */
    private $orderNumber;
    /** @var Item[] */
    private $items = array();

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return Order
     */
    public function setUid(string $uid): Order
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCia(): string
    {
        return $this->cia;
    }

    /**
     * @param string $cia
     * @return Order
     */
    public function setCia(string $cia): Order
    {
        $this->cia = $cia;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnio(): string
    {
        return $this->anio;
    }

    /**
     * @param string $anio
     * @return Order
     */
    public function setAnio(string $anio): Order
    {
        $this->anio = $anio;
        return $this;
    }

    /**
     * @return string
     */
    public function getApp(): string
    {
        return $this->app;
    }

    /**
     * @param string $app
     * @return Order
     */
    public function setApp(string $app): Order
    {
        $this->app = $app;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }

    /**
     * @param string $documentNumber
     * @return Order
     */
    public function setDocumentNumber(string $documentNumber): Order
    {
        $this->documentNumber = $documentNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    /**
     * @param string $documentType
     * @return Order
     */
    public function setDocumentType(string $documentType): Order
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingNames(): string
    {
        return $this->billingNames;
    }

    /**
     * @param string $billingNames
     * @return Order
     */
    public function setBillingNames(string $billingNames): Order
    {
        $this->billingNames = $billingNames;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingLastNames(): string
    {
        return $this->billingLastNames;
    }

    /**
     * @param string $billingLastNames
     * @return Order
     */
    public function setBillingLastNames(string $billingLastNames): Order
    {
        $this->billingLastNames = $billingLastNames;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Order
     */
    public function setEmail(string $email): Order
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressInvoice(): string
    {
        return $this->addressInvoice;
    }

    /**
     * @param string $addressInvoice
     * @return Order
     */
    public function setAddressInvoice(string $addressInvoice): Order
    {
        $this->addressInvoice = $addressInvoice;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressShipping(): string
    {
        return $this->addressShipping;
    }

    /**
     * @param string $addressShipping
     * @return Order
     */
    public function setAddressShipping(string $addressShipping): Order
    {
        $this->addressShipping = $addressShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getNamesShipping(): string
    {
        return $this->namesShipping;
    }

    /**
     * @param string $namesShipping
     * @return Order
     */
    public function setNamesShipping(string $namesShipping): Order
    {
        $this->namesShipping = $namesShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastNamesShipping(): string
    {
        return $this->lastNamesShipping;
    }

    /**
     * @param string $lastNamesShipping
     * @return Order
     */
    public function setLastNamesShipping(string $lastNamesShipping): Order
    {
        $this->lastNamesShipping = $lastNamesShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getCityBilling(): string
    {
        return $this->cityBilling;
    }

    /**
     * @param string $cityBilling
     * @return Order
     */
    public function setCityBilling(string $cityBilling): Order
    {
        $this->cityBilling = $cityBilling;
        return $this;
    }

    /**
     * @return string
     */
    public function getCityShipping(): string
    {
        return $this->cityShipping;
    }

    /**
     * @param string $cityShipping
     * @return Order
     */
    public function setCityShipping(string $cityShipping): Order
    {
        $this->cityShipping = $cityShipping;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Order
     */
    public function setCountry(string $country): Order
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingPhone(): string
    {
        return $this->billingPhone;
    }

    /**
     * @param string $billingPhone
     * @return Order
     */
    public function setBillingPhone(string $billingPhone): Order
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getBillingMovilPhone(): string
    {
        return $this->billingMovilPhone;
    }

    /**
     * @param string $billingMovilPhone
     * @return Order
     */
    public function setBillingMovilPhone(string $billingMovilPhone): Order
    {
        $this->billingMovilPhone = $billingMovilPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingPhone(): string
    {
        return $this->shippingPhone;
    }

    /**
     * @param string $shippingPhone
     * @return Order
     */
    public function setShippingPhone(string $shippingPhone): Order
    {
        $this->shippingPhone = $shippingPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMovilPhone(): string
    {
        return $this->shippingMovilPhone;
    }

    /**
     * @param string $shippingMovilPhone
     * @return Order
     */
    public function setShippingMovilPhone(string $shippingMovilPhone): Order
    {
        $this->shippingMovilPhone = $shippingMovilPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassCode(): string
    {
        return $this->classCode;
    }

    /**
     * @param string $classCode
     * @return Order
     */
    public function setClassCode(string $classCode): Order
    {
        $this->classCode = $classCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getConditionPayCode(): string
    {
        return $this->conditionPayCode;
    }

    /**
     * @param string $conditionPayCode
     * @return Order
     */
    public function setConditionPayCode(string $conditionPayCode): Order
    {
        $this->conditionPayCode = $conditionPayCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountCode(): string
    {
        return $this->discountCode;
    }

    /**
     * @param string $discountCode
     * @return Order
     */
    public function setDiscountCode(string $discountCode): Order
    {
        $this->discountCode = $discountCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentDate(): string
    {
        return $this->documentDate;
    }

    /**
     * @param string $documentDate
     * @return Order
     */
    public function setDocumentDate(string $documentDate): Order
    {
        $this->documentDate = $documentDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseOrder(): string
    {
        return $this->purchaseOrder;
    }

    /**
     * @param string $purchaseOrder
     * @return Order
     */
    public function setPurchaseOrder(string $purchaseOrder): Order
    {
        $this->purchaseOrder = $purchaseOrder;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubtotal(): int
    {
        return $this->subtotal;
    }

    /**
     * @param int $subtotal
     * @return Order
     */
    public function setSubtotal(int $subtotal): Order
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    /**
     * @param int $totalAmount
     * @return Order
     */
    public function setTotalAmount(int $totalAmount): Order
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingValue(): int
    {
        return $this->shippingValue;
    }

    /**
     * @param int $shippingValue
     * @return Order
     */
    public function setShippingValue(int $shippingValue): Order
    {
        $this->shippingValue = $shippingValue;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxAmount(): int
    {
        return $this->taxAmount;
    }

    /**
     * @param int $taxAmount
     * @return Order
     */
    public function setTaxAmount(int $taxAmount): Order
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiscountTotal(): int
    {
        return $this->discountTotal;
    }

    /**
     * @param int $discountTotal
     * @return Order
     */
    public function setDiscountTotal(int $discountTotal): Order
    {
        $this->discountTotal = $discountTotal;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrandTotal(): int
    {
        return $this->grandTotal;
    }

    /**
     * @param int $grandTotal
     * @return Order
     */
    public function setGrandTotal(int $grandTotal): Order
    {
        $this->grandTotal = $grandTotal;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     * @return Order
     */
    public function setOrderNumber(string $orderNumber): Order
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Order
     */
    public function setItems(array $items): Order
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
        return $this;
    }

}
