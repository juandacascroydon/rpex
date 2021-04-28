<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONPEDHIST
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
     * @var string $tipo
     */
    protected $tipo = null;

    /**
     * @var string $fechaIni
     */
    protected $fechaIni = null;

    /**
     * @var string $fechaFin
     */
    protected $fechaFin = null;

    /**
     * @var string $puntoPartida
     */
    protected $puntoPartida = null;

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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
      return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
     */
    public function setTipo($tipo)
    {
      $this->tipo = $tipo;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaIni()
    {
      return $this->fechaIni;
    }

    /**
     * @param string $fechaIni
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
     */
    public function setFechaIni($fechaIni)
    {
      $this->fechaIni = $fechaIni;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaFin()
    {
      return $this->fechaFin;
    }

    /**
     * @param string $fechaFin
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
     */
    public function setFechaFin($fechaFin)
    {
      $this->fechaFin = $fechaFin;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPEDHIST
     */
    public function setNoRegistros($noRegistros)
    {
      $this->noRegistros = $noRegistros;
      return $this;
    }

}
