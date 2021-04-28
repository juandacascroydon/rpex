<?php

namespace Croydon\Services\Webservice\Facturacion;

class FacActOrdenPedido
{

    /**
     * @var string $cadenaOrdenPedido
     */
    protected $cadenaOrdenPedido = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCadenaOrdenPedido()
    {
      return $this->cadenaOrdenPedido;
    }

    /**
     * @param string $cadenaOrdenPedido
     * @return \Croydon\Services\Webservice\Facturacion\FacActOrdenPedido
     */
    public function setCadenaOrdenPedido($cadenaOrdenPedido)
    {
      $this->cadenaOrdenPedido = $cadenaOrdenPedido;
      return $this;
    }

}
