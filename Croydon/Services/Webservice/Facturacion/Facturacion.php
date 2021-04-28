<?php

namespace Croydon\Services\Webservice\Facturacion;

class Facturacion extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'hello' => 'Croydon\\Services\\Webservice\\Facturacion\\hello',
      'helloResponse' => 'Croydon\\Services\\Webservice\\Facturacion\\helloResponse',
      'FacActFactura' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActFactura',
      'FacActFacturaResponse' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActFacturaResponse',
      'FacActOrdenPedido' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActOrdenPedido',
      'FacActOrdenPedidoResponse' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActOrdenPedidoResponse',
      'FacActOrdenWeb' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActOrdenWeb',
      'FacActOrdenWebResponse' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActOrdenWebResponse',
      'FacActRedencionIncentivos' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActRedencionIncentivos',
      'FacActRedencionIncentivosResponse' => 'Croydon\\Services\\Webservice\\Facturacion\\FacActRedencionIncentivosResponse',
    );

    /**
     * @param string $wsdl The wsdl file to use
     * @param array $options A array of config values
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        //$wsdl = 'http://190.25.225.85:8080/CroydonFactura/Facturacion?wsdl';
        $wsdl = 'http://pruebas.croydon.com.co:8080/CroydonFactura/Facturacion?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param FacActFactura $parameters
     * @return FacActFacturaResponse
     */
    public function FacActFactura(FacActFactura $parameters)
    {
      return $this->__soapCall('FacActFactura', array($parameters));
    }

    /**
     * @param hello $parameters
     * @return helloResponse
     */
    public function hello(hello $parameters)
    {
      return $this->__soapCall('hello', array($parameters));
    }

    /**
     * @param FacActOrdenWeb $parameters
     * @return FacActOrdenWebResponse
     */
    public function FacActOrdenWeb(FacActOrdenWeb $parameters)
    {
      return $this->__soapCall('FacActOrdenWeb', array($parameters));
    }

    /**
     * @param FacActRedencionIncentivos $parameters
     * @return FacActRedencionIncentivosResponse
     */
    public function FacActRedencionIncentivos(FacActRedencionIncentivos $parameters)
    {
      return $this->__soapCall('FacActRedencionIncentivos', array($parameters));
    }

    /**
     * @param FacActOrdenPedido $parameters
     * @return FacActOrdenPedidoResponse
     */
    public function FacActOrdenPedido(FacActOrdenPedido $parameters)
    {
      return $this->__soapCall('FacActOrdenPedido', array($parameters));
    }

}
