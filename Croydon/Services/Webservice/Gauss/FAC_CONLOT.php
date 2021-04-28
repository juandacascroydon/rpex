<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONLOT
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
     * @var string $sucursal
     */
    protected $sucursal = null;

    /**
     * @var string $codigoItem
     */
    protected $codigoItem = null;

    /**
     * @var string $codigoSeleccion
     */
    protected $codigoSeleccion = null;

    /**
     * @var string $porcion
     */
    protected $porcion = null;

    /**
     * @var string $puntoPartida
     */
    protected $puntoPartida = null;

    /**
     * @var string $direccion
     */
    protected $direccion = null;

    /**
     * @var string $noItems
     */
    protected $noItems = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setApp($app)
    {
      $this->app = $app;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoItem()
    {
      return $this->codigoItem;
    }

    /**
     * @param string $codigoItem
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setCodigoItem($codigoItem)
    {
      $this->codigoItem = $codigoItem;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoSeleccion()
    {
      return $this->codigoSeleccion;
    }

    /**
     * @param string $codigoSeleccion
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setCodigoSeleccion($codigoSeleccion)
    {
      $this->codigoSeleccion = $codigoSeleccion;
      return $this;
    }

    /**
     * @return string
     */
    public function getPorcion()
    {
      return $this->porcion;
    }

    /**
     * @param string $porcion
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setPorcion($porcion)
    {
      $this->porcion = $porcion;
      return $this;
    }

    /**
     * @return string
     */
    public function getPuntoPartida()
    {
      return $this->puntoPartida;
    }

    /**
     * @param string $puntoPartida
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setPuntoPartida($puntoPartida)
    {
      $this->puntoPartida = $puntoPartida;
      return $this;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
      return $this->direccion;
    }

    /**
     * @param string $direccion
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setDireccion($direccion)
    {
      $this->direccion = $direccion;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoItems()
    {
      return $this->noItems;
    }

    /**
     * @param string $noItems
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLOT
     */
    public function setNoItems($noItems)
    {
      $this->noItems = $noItems;
      return $this;
    }

}
