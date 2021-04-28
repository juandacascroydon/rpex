<?php

namespace Croydon\Services\Webservice\Facturacion;

class FacActOrdenWeb
{

    /**
     * @var string $cadenaOrdCompra
     */
    protected $cadenaOrdCompra = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCadenaOrdCompra()
    {
      return $this->cadenaOrdCompra;
    }

    /**
     * @param string $cadenaOrdCompra
     * @return \Croydon\Services\Webservice\Facturacion\FacActOrdenWeb
     */
    public function setCadenaOrdCompra($cadenaOrdCompra)
    {
      $this->cadenaOrdCompra = $cadenaOrdCompra;
      return $this;
    }

}
