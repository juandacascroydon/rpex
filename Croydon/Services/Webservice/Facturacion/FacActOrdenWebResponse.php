<?php

namespace Croydon\Services\Webservice\Facturacion;

class FacActOrdenWebResponse
{

    /**
     * @var string $return
     */
    protected $return = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param string $return
     * @return \Croydon\Services\Webservice\Facturacion\FacActOrdenWebResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
