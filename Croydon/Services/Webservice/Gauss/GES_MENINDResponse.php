<?php

namespace Croydon\Services\Webservice\Gauss;

class GES_MENINDResponse
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
     * @return \Croydon\Services\Webservice\Gauss\GES_MENINDResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
