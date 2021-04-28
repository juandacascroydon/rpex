<?php

namespace Croydon\Services\Webservice\Gauss;

class FAC_CONLIQPResponse
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
     * @return \Croydon\Services\Webservice\Gauss\FAC_CONLIQPResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
