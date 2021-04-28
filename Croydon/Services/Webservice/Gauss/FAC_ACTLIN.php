<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_ACTLIN
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
     * @var string $cedulaONitCliente
     */
    protected $cedulaONitCliente = null;

    /**
     * @var string $sucursal
     */
    protected $sucursal = null;

    /**
     * @var string $noOrdenPedido
     */
    protected $noOrdenPedido = null;

    /**
     * @var string $lineaDeOrden
     */
    protected $lineaDeOrden = null;

    /**
     * @var string $codigoItem
     */
    protected $codigoItem = null;

    /**
     * @var string $codSeleccion
     */
    protected $codSeleccion = null;

    /**
     * @var string $codLote
     */
    protected $codLote = null;

    /**
     * @var string $cantidad
     */
    protected $cantidad = null;

    /**
     * @var string $novedad
     */
    protected $novedad = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCedula($cedula)
    {
      $this->cedula = $cedula;
      return $this;
    }

    /**
     * @return string
     */
    public function getCedulaONitCliente()
    {
      return $this->cedulaONitCliente;
    }

    /**
     * @param string $cedulaONitCliente
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCedulaONitCliente($cedulaONitCliente)
    {
      $this->cedulaONitCliente = $cedulaONitCliente;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setNoOrdenPedido($noOrdenPedido)
    {
      $this->noOrdenPedido = $noOrdenPedido;
      return $this;
    }

    /**
     * @return string
     */
    public function getLineaDeOrden()
    {
      return $this->lineaDeOrden;
    }

    /**
     * @param string $lineaDeOrden
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setLineaDeOrden($lineaDeOrden)
    {
      $this->lineaDeOrden = $lineaDeOrden;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCodigoItem($codigoItem)
    {
      $this->codigoItem = $codigoItem;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodSeleccion()
    {
      return $this->codSeleccion;
    }

    /**
     * @param string $codSeleccion
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCodSeleccion($codSeleccion)
    {
      $this->codSeleccion = $codSeleccion;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodLote()
    {
      return $this->codLote;
    }

    /**
     * @param string $codLote
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCodLote($codLote)
    {
      $this->codLote = $codLote;
      return $this;
    }

    /**
     * @return string
     */
    public function getCantidad()
    {
      return $this->cantidad;
    }

    /**
     * @param string $cantidad
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setCantidad($cantidad)
    {
      $this->cantidad = $cantidad;
      return $this;
    }

    /**
     * @return string
     */
    public function getNovedad()
    {
      return $this->novedad;
    }

    /**
     * @param string $novedad
     * @return \Croydon\Services\Webservice\Gauss\FAC_ACTLIN
     */
    public function setNovedad($novedad)
    {
      $this->novedad = $novedad;
      return $this;
    }

}
