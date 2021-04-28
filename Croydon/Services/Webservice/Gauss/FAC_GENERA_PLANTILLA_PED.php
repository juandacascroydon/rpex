<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_GENERA_PLANTILLA_PED
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
     * @var string $noOrden
     */
    protected $noOrden = null;

    /**
     * @var string $descripcion
     */
    protected $descripcion = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoOrden()
    {
      return $this->noOrden;
    }

    /**
     * @param string $noOrden
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
     */
    public function setNoOrden($noOrden)
    {
      $this->noOrden = $noOrden;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
      return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERA_PLANTILLA_PED
     */
    public function setDescripcion($descripcion)
    {
      $this->descripcion = $descripcion;
      return $this;
    }

}
