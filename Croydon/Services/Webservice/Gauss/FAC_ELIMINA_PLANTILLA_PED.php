<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_ELIMINA_PLANTILLA_PED
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
     * @var string $codPlantilla
     */
    protected $codPlantilla = null;

    
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
     */
    public function setCedula($cedula)
    {
      $this->cedula = $cedula;
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_ELIMINA_PLANTILLA_PED
     */
    public function setCodPlantilla($codPlantilla)
    {
      $this->codPlantilla = $codPlantilla;
      return $this;
    }

}
