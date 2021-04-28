<?php

namespace Croydon\Services\Webservice\Facturacion;

class FacActFactura
{

    /**
     * @var string $cadenaActFactura
     */
    protected $cadenaActFactura = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCadenaActFactura()
    {
      return $this->cadenaActFactura;
    }

    /**
     * @param string $cadenaActFactura
     * @return \Croydon\Services\Webservice\Facturacion\FacActFactura
     */
    public function setCadenaActFactura($cadenaActFactura)
    {
      $this->cadenaActFactura = $cadenaActFactura;
      return $this;
    }

}
