<?php


namespace Croydon\Services\Webservice\Model;


class Item
{

    /**
     * @var string
     */
    private $sku;
    /**
     * @var int
     */
    private $unitPrice;

    /**
     * @var int
     */
    private $qty;
    /**
     * @var string
     */
    private $taxCode;

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Item
     */
    public function setSku(string $sku): Item
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     * @return Item
     */
    public function setUnitPrice(int $unitPrice): Item
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     * @return Item
     */
    public function setQty(int $qty): Item
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxCode(): string
    {
        return $this->taxCode;
    }

    /**
     * @param string $taxCode
     * @return Item
     */
    public function setTaxCode(string $taxCode): Item
    {
        $this->taxCode = $taxCode;
        return $this;
    }


}