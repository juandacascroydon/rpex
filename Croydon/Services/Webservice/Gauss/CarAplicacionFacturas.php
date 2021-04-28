<?php

namespace Croydon\Services\Webservice\Gauss;

class CarAplicacionFacturas
{

    /**
     * @var string $uid
     */
    protected $uid = null;

    /**
     * @var string $cia
     */
    protected $cia = null;

    /**
     * @var string $ano
     */
    protected $ano = null;

    /**
     * @var string $app
     */
    protected $app = null;

    /**
     * @var string $cliente
     */
    protected $cliente = null;

    /**
     * @var string $sucursal
     */
    protected $sucursal = null;

    /**
     * @var string $factura
     */
    protected $factura = null;

    /**
     * @var string $parcial
     */
    protected $parcial = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getUid()
    {
      return $this->uid;
    }

    /**
     * @param string $uid
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setUid($uid)
    {
      $this->uid = $uid;
      return $this;
    }

    /**
     * @return string
     */
    public function getCia()
    {
      return $this->cia;
    }

    /**
     * @param string $cia
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setCia($cia)
    {
      $this->cia = $cia;
      return $this;
    }

    /**
     * @return string
     */
    public function getAno()
    {
      return $this->ano;
    }

    /**
     * @param string $ano
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setAno($ano)
    {
      $this->ano = $ano;
      return $this;
    }

    /**
     * @return string
     */
    public function getApp()
    {
      return $this->app;
    }

    /**
     * @param string $app
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getCliente()
    {
      return $this->cliente;
    }

    /**
     * @param string $cliente
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setCliente($cliente)
    {
      $this->cliente = $cliente;
      return $this;
    }

    /**
     * @return string
     */
    public function getSucursal()
    {
      return $this->sucursal;
    }

    /**
     * @param string $sucursal
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getFactura()
    {
      return $this->factura;
    }

    /**
     * @param string $factura
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setFactura($factura)
    {
      $this->factura = $factura;
      return $this;
    }

    /**
     * @return string
     */
    public function getParcial()
    {
      return $this->parcial;
    }

    /**
     * @param string $parcial
     * @return \Croydon\Services\Webservice\Gauss\CarAplicacionFacturas
     */
    public function setParcial($parcial)
    {
      $this->parcial = $parcial;
      return $this;
    }

}
