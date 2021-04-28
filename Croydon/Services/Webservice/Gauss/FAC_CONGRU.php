<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONGRU
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
     * @var string $porcion
     */
    protected $porcion = null;

    /**
     * @var string $puntodePartida
     */
    protected $puntodePartida = null;

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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
     */
    public function setApp($app)
    {
      $this->app = $app;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
     */
    public function setPorcion($porcion)
    {
      $this->porcion = $porcion;
      return $this;
    }

    /**
     * @return string
     */
    public function getPuntodePartida()
    {
      return $this->puntodePartida;
    }

    /**
     * @param string $puntodePartida
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
     */
    public function setPuntodePartida($puntodePartida)
    {
      $this->puntodePartida = $puntodePartida;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONGRU
     */
    public function setNoItems($noItems)
    {
      $this->noItems = $noItems;
      return $this;
    }

}
