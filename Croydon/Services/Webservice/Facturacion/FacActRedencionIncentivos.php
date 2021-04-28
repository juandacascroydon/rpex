<?php

namespace Croydon\Services\Webservice\Facturacion;

class FacActRedencionIncentivos
{

    /**
     * @var string $cadenaIncentivos
     */
    protected $cadenaIncentivos = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCadenaIncentivos()
    {
      return $this->cadenaIncentivos;
    }

    /**
     * @param string $cadenaIncentivos
     * @return \Croydon\Services\Webservice\Facturacion\FacActRedencionIncentivos
     */
    public function setCadenaIncentivos($cadenaIncentivos)
    {
      $this->cadenaIncentivos = $cadenaIncentivos;
      return $this;
    }

}
