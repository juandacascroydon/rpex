<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONDIR
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
     * @var string $nitCliente
     */
    protected $nitCliente = null;

    /**
     * @var string $codDireccion
     */
    protected $codDireccion = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getNitCliente()
    {
      return $this->nitCliente;
    }

    /**
     * @param string $nitCliente
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
     */
    public function setNitCliente($nitCliente)
    {
      $this->nitCliente = $nitCliente;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodDireccion()
    {
      return $this->codDireccion;
    }

    /**
     * @param string $codDireccion
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONDIR
     */
    public function setCodDireccion($codDireccion)
    {
      $this->codDireccion = $codDireccion;
      return $this;
    }

}
