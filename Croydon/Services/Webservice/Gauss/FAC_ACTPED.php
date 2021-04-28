<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_ACTPED
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
     * @var string $noOrdenPedido
     */
    protected $noOrdenPedido = null;

    /**
     * @var string $correo
     */
    protected $correo = null;

    /**
     * @var string $dirMercancia
     */
    protected $dirMercancia = null;

    /**
     * @var string $dirFacturacion
     */
    protected $dirFacturacion = null;

    /**
     * @var string $fechaInicio
     */
    protected $fechaInicio = null;

    /**
     * @var string $fechaFin
     */
    protected $fechaFin = null;

    /**
     * @var string $observaciones
     */
    protected $observaciones = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoOrdenPedido()
    {
      return $this->noOrdenPedido;
    }

    /**
     * @param string $noOrdenPedido
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setNoOrdenPedido($noOrdenPedido)
    {
      $this->noOrdenPedido = $noOrdenPedido;
      return $this;
    }

    /**
     * @return string
     */
    public function getCorreo()
    {
      return $this->correo;
    }

    /**
     * @param string $correo
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setCorreo($correo)
    {
      $this->correo = $correo;
      return $this;
    }

    /**
     * @return string
     */
    public function getDirMercancia()
    {
      return $this->dirMercancia;
    }

    /**
     * @param string $dirMercancia
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setDirMercancia($dirMercancia)
    {
      $this->dirMercancia = $dirMercancia;
      return $this;
    }

    /**
     * @return string
     */
    public function getDirFacturacion()
    {
      return $this->dirFacturacion;
    }

    /**
     * @param string $dirFacturacion
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setDirFacturacion($dirFacturacion)
    {
      $this->dirFacturacion = $dirFacturacion;
      return $this;
    }

    /**
     * @return string
     */
    public function getFechaInicio()
    {
      return $this->fechaInicio;
    }

    /**
     * @param string $fechaInicio
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setFechaInicio($fechaInicio)
    {
      $this->fechaInicio = $fechaInicio;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setFechaFin($fechaFin)
    {
      $this->fechaFin = $fechaFin;
      return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
      return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTPED
     */
    public function setObservaciones($observaciones)
    {
      $this->observaciones = $observaciones;
      return $this;
    }

}
