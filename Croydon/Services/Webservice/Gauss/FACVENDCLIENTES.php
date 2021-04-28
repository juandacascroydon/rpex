<?php

namespace Croydon\Services\Webservice\Gauss;

class FACVENDCLIENTES
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
     * @var string $cedvend
     */
    protected $cedvend = null;

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
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
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
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
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
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
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
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
     */
    public function setApp($app)
    {
      $this->app = $app;
      return $this;
    }

    /**
     * @return string
     */
    public function getCedvend()
    {
      return $this->cedvend;
    }

    /**
     * @param string $cedvend
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
     */
    public function setCedvend($cedvend)
    {
      $this->cedvend = $cedvend;
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
     * @return \Croydon\Services\Webservice\Gauss\FACVENDCLIENTES
     */
    public function setNoRegistros($noRegistros)
    {
      $this->noRegistros = $noRegistros;
      return $this;
    }

}
