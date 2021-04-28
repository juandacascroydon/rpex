<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONINI
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
     * @var string $sucursal
     */
    protected $sucursal = null;

    /**
     * @var string $codigoCategoria
     */
    protected $codigoCategoria = null;

    /**
     * @var string $codigoSubCategoria
     */
    protected $codigoSubCategoria = null;

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

    /**
     * @var string $porcionNombre
     */
    protected $porcionNombre = null;

    /**
     * @var string $porcionCodigo
     */
    protected $porcionCodigo = null;

    /**
     * @var string $porcionReferencia
     */
    protected $porcionReferencia = null;

    /**
     * @var string $porcionDiseno
     */
    protected $porcionDiseno = null;

    /**
     * @var string $codEvento
     */
    protected $codEvento = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setCedula($cedula)
    {
      $this->cedula = $cedula;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoCategoria()
    {
      return $this->codigoCategoria;
    }

    /**
     * @param string $codigoCategoria
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setCodigoCategoria($codigoCategoria)
    {
      $this->codigoCategoria = $codigoCategoria;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodigoSubCategoria()
    {
      return $this->codigoSubCategoria;
    }

    /**
     * @param string $codigoSubCategoria
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setCodigoSubCategoria($codigoSubCategoria)
    {
      $this->codigoSubCategoria = $codigoSubCategoria;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setNoRegistros($noRegistros)
    {
      $this->noRegistros = $noRegistros;
      return $this;
    }

    /**
     * @return string
     */
    public function getPorcionNombre()
    {
      return $this->porcionNombre;
    }

    /**
     * @param string $porcionNombre
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setPorcionNombre($porcionNombre)
    {
      $this->porcionNombre = $porcionNombre;
      return $this;
    }

    /**
     * @return string
     */
    public function getPorcionCodigo()
    {
      return $this->porcionCodigo;
    }

    /**
     * @param string $porcionCodigo
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setPorcionCodigo($porcionCodigo)
    {
      $this->porcionCodigo = $porcionCodigo;
      return $this;
    }

    /**
     * @return string
     */
    public function getPorcionReferencia()
    {
      return $this->porcionReferencia;
    }

    /**
     * @param string $porcionReferencia
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setPorcionReferencia($porcionReferencia)
    {
      $this->porcionReferencia = $porcionReferencia;
      return $this;
    }

    /**
     * @return string
     */
    public function getPorcionDiseno()
    {
      return $this->porcionDiseno;
    }

    /**
     * @param string $porcionDiseno
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setPorcionDiseno($porcionDiseno)
    {
      $this->porcionDiseno = $porcionDiseno;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodEvento()
    {
      return $this->codEvento;
    }

    /**
     * @param string $codEvento
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONINI
     */
    public function setCodEvento($codEvento)
    {
      $this->codEvento = $codEvento;
      return $this;
    }

}
