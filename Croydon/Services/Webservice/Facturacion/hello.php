<?php

namespace Croydon\Services\Webservice\Facturacion;

class hello
{

    /**
     * @var string $name
     */
    protected $name = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param string $name
     * @return \Croydon\Services\Webservice\Facturacion\hello
     */
    public function setName($name)
    {
      $this->name = $name;
      return $this;
    }

}
