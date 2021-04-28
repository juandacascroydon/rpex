<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CARGA_PLANTILLAS
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
     * @var string $cedula
     */
    protected $cedula = null;

    /**
     * @var string $porcion
     */
    protected $porcion = null;

    /**
     * @var string $ptoPartida
     */
    protected $ptoPartida = null;

    /**
     * @var string $direccion
     */
    protected $direccion = null;

    /**
     * @var string $noRegistros
     */
    protected $noRegistros = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getCedula()
    {
      return $this->cedula;
    }

    /**
     * @param string $cedula
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setCedula($cedula)
    {
      $this->cedula = $cedula;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setPorcion($porcion)
    {
      $this->porcion = $porcion;
      return $this;
    }

    /**
     * @return string
     */
    public function getPtoPartida()
    {
      return $this->ptoPartida;
    }

    /**
     * @param string $ptoPartida
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setPtoPartida($ptoPartida)
    {
      $this->ptoPartida = $ptoPartida;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setDireccion($direccion)
    {
      $this->direccion = $direccion;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoRegistros()
    {
      return $this->noRegistros;
    }

    /**
     * @param string $noRegistros
     * @return \Croydon\Services\Webservice\Gauss\FAC_CARGA_PLANTILLAS
     */
    public function setNoRegistros($noRegistros)
    {
      $this->noRegistros = $noRegistros;
      return $this;
    }

}
