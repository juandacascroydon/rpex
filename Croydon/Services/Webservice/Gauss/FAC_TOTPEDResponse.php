<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_TOTPEDResponse
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_TOTPEDResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
