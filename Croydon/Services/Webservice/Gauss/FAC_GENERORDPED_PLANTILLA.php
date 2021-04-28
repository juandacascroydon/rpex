<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_GENERORDPED_PLANTILLA
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
     * @var string $clienteAutenticado
     */
    protected $clienteAutenticado = null;

    /**
     * @var string $Cliente
     */
    protected $Cliente = null;

    /**
     * @var string $codPlantilla
     */
    protected $codPlantilla = null;

    /**
     * @var string $sucursal
     */
    protected $sucursal = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getClienteAutenticado()
    {
      return $this->clienteAutenticado;
    }

    /**
     * @param string $clienteAutenticado
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
     */
    public function setClienteAutenticado($clienteAutenticado)
    {
      $this->clienteAutenticado = $clienteAutenticado;
      return $this;
    }

    /**
     * @return string
     */
    public function getCliente()
    {
      return $this->Cliente;
    }

    /**
     * @param string $Cliente
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
     */
    public function setCliente($Cliente)
    {
      $this->Cliente = $Cliente;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodPlantilla()
    {
      return $this->codPlantilla;
    }

    /**
     * @param string $codPlantilla
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
     */
    public function setCodPlantilla($codPlantilla)
    {
      $this->codPlantilla = $codPlantilla;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_GENERORDPED_PLANTILLA
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

}
