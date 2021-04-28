<?php

namespace Croydon\Services\Webservice\Gauss;

class InvConsultaItemTiendas
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
     * @var string $codItem
     */
    protected $codItem = null;

    /**
     * @var string $codCiudad
     */
    protected $codCiudad = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
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
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
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
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
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
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodItem()
    {
      return $this->codItem;
    }

    /**
     * @param string $codItem
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
     */
    public function setCodItem($codItem)
    {
      $this->codItem = $codItem;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodCiudad()
    {
      return $this->codCiudad;
    }

    /**
     * @param string $codCiudad
     * @return \Croydon\Services\Webservice\Gauss\InvConsultaItemTiendas
     */
    public function setCodCiudad($codCiudad)
    {
      $this->codCiudad = $codCiudad;
      return $this;
    }

}
