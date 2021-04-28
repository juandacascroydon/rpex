<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONPED
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
     * @var string $noPedido
     */
    protected $noPedido = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
     */
    public function setSucursal($sucursal)
    {
      $this->sucursal = $sucursal;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoPedido()
    {
      return $this->noPedido;
    }

    /**
     * @param string $noPedido
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONPED
     */
    public function setNoPedido($noPedido)
    {
      $this->noPedido = $noPedido;
      return $this;
    }

}
