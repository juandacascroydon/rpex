<?php

namespace Croydon\Services\Webservice\Gauss;

class FacturacionService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'FAC_CONDIR' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONDIR',
      'FAC_CONDIRResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONDIRResponse',
      'FAC_TOTPED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_TOTPED',
      'FAC_TOTPEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_TOTPEDResponse',
      'FACPRECIOSEL' => 'Croydon\\Services\\Webservice\\Gauss\\FACPRECIOSEL',
      'FACPRECIOSELResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FACPRECIOSELResponse',
      'FAC_ACTLIN' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ACTLIN',
      'FAC_ACTLINResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ACTLINResponse',
      'FAC_CONLOT' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONLOT',
      'FAC_CONLOTResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONLOTResponse',
      'FAC_ACTPED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ACTPED',
      'FAC_ACTPEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ACTPEDResponse',
      'FAC_CONPED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPED',
      'FAC_CONPEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPEDResponse',
      'FAC_ELIMINA_PLANTILLA_PED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMINA_PLANTILLA_PED',
      'FAC_ELIMINA_PLANTILLA_PEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMINA_PLANTILLA_PEDResponse',
      'FAC_ELIMPED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMPED',
      'FAC_ELIMPEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMPEDResponse',
      'InvConsultaItemTiendas' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaItemTiendas',
      'InvConsultaItemTiendasResponse' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaItemTiendasResponse',
      'FAC_CONDET' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONDET',
      'FAC_CONDETResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONDETResponse',
      'FAC_CONPEDHIST' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPEDHIST',
      'FAC_CONPEDHISTResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPEDHISTResponse',
      'FAC_GENERA_PLANTILLA_PED' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_GENERA_PLANTILLA_PED',
      'FAC_GENERA_PLANTILLA_PEDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_GENERA_PLANTILLA_PEDResponse',
      'FAC_CONINIP' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONINIP',
      'FAC_CONINIPResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONINIPResponse',
      'FacConsultaGuia' => 'Croydon\\Services\\Webservice\\Gauss\\FacConsultaGuia',
      'FacConsultaGuiaResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FacConsultaGuiaResponse',
      'FAC_CONINI' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONINI',
      'FAC_CONINIResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONINIResponse',
      'FAC_CONGRU' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONGRU',
      'FAC_CONGRUResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONGRUResponse',
      'GES_MENIND' => 'Croydon\\Services\\Webservice\\Gauss\\GES_MENIND',
      'GES_MENINDResponse' => 'Croydon\\Services\\Webservice\\Gauss\\GES_MENINDResponse',
      'FAC_CONPEDINI' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPEDINI',
      'FAC_CONPEDINIResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONPEDINIResponse',
      'FAC_ELIMINA_PLANTILLA' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMINA_PLANTILLA',
      'FAC_ELIMINA_PLANTILLAResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_ELIMINA_PLANTILLAResponse',
      'FAC_CONLIQP' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONLIQP',
      'FAC_CONLIQPResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONLIQPResponse',
      'FACVENDCLIENTES' => 'Croydon\\Services\\Webservice\\Gauss\\FACVENDCLIENTES',
      'FACVENDCLIENTESResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FACVENDCLIENTESResponse',
      'FAC_GENERORDPED_PLANTILLA' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_GENERORDPED_PLANTILLA',
      'FAC_GENERORDPED_PLANTILLAResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_GENERORDPED_PLANTILLAResponse',
      'FAC_CONSULTA_PLANTILLA' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSULTA_PLANTILLA',
      'FAC_CONSULTA_PLANTILLAResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSULTA_PLANTILLAResponse',
      'InvConsultaDispItemBod' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaDispItemBod',
      'InvConsultaDispItemBodResponse' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaDispItemBodResponse',
      'FacConsultaEstadoCartera' => 'Croydon\\Services\\Webservice\\Gauss\\FacConsultaEstadoCartera',
      'FacConsultaEstadoCarteraResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FacConsultaEstadoCarteraResponse',
      'InvConsultaDispCroydonista' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaDispCroydonista',
      'InvConsultaDispCroydonistaResponse' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaDispCroydonistaResponse',
      'FAC_CONSGRU' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSGRU',
      'FAC_CONSGRUResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSGRUResponse',
      'FAC_CARGA_PLANTILLAS' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CARGA_PLANTILLAS',
      'FAC_CARGA_PLANTILLASResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CARGA_PLANTILLASResponse',
      'FAC_CONSUC' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSUC',
      'FAC_CONSUCResponse' => 'Croydon\\Services\\Webservice\\Gauss\\FAC_CONSUCResponse',
      'InvConsultaItemIncentivo' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaItemIncentivo',
      'InvConsultaItemIncentivoResponse' => 'Croydon\\Services\\Webservice\\Gauss\\InvConsultaItemIncentivoResponse',
      'CarAplicacionFacturas' => 'Croydon\\Services\\Webservice\\Gauss\\CarAplicacionFacturas',
      'CarAplicacionFacturasResponse' => 'Croydon\\Services\\Webservice\\Gauss\\CarAplicacionFacturasResponse',
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
        $wsdl = 'http://190.25.225.85:8080/Gauss/FacturacionService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param FacConsultaEstadoCartera $parameters
     * @return FacConsultaEstadoCarteraResponse
     */
    public function FacConsultaEstadoCartera(FacConsultaEstadoCartera $parameters)
    {
      return $this->__soapCall('FacConsultaEstadoCartera', array($parameters));
    }

    /**
     * @param FAC_CONSULTA_PLANTILLA $parameters
     * @return FAC_CONSULTA_PLANTILLAResponse
     */
    public function FAC_CONSULTA_PLANTILLA(FAC_CONSULTA_PLANTILLA $parameters)
    {
      return $this->__soapCall('FAC_CONSULTA_PLANTILLA', array($parameters));
    }

    /**
     * @param CarAplicacionFacturas $parameters
     * @return CarAplicacionFacturasResponse
     */
    public function CarAplicacionFacturas(CarAplicacionFacturas $parameters)
    {
      return $this->__soapCall('CarAplicacionFacturas', array($parameters));
    }

    /**
     * @param FAC_CARGA_PLANTILLAS $parameters
     * @return FAC_CARGA_PLANTILLASResponse
     */
    public function FAC_CARGA_PLANTILLAS(FAC_CARGA_PLANTILLAS $parameters)
    {
      return $this->__soapCall('FAC_CARGA_PLANTILLAS', array($parameters));
    }

    /**
     * @param InvConsultaItemTiendas $parameters
     * @return InvConsultaItemTiendasResponse
     */
    public function InvConsultaItemTiendas(InvConsultaItemTiendas $parameters)
    {
      return $this->__soapCall('InvConsultaItemTiendas', array($parameters));
    }

    /**
     * @param FAC_GENERORDPED_PLANTILLA $parameters
     * @return FAC_GENERORDPED_PLANTILLAResponse
     */
    public function FAC_GENERORDPED_PLANTILLA(FAC_GENERORDPED_PLANTILLA $parameters)
    {
      return $this->__soapCall('FAC_GENERORDPED_PLANTILLA', array($parameters));
    }

    /**
     * @param InvConsultaDispItemBod $parameters
     * @return InvConsultaDispItemBodResponse
     */
    public function InvConsultaDispItemBod(InvConsultaDispItemBod $parameters)
    {
      return $this->__soapCall('InvConsultaDispItemBod', array($parameters));
    }

    /**
     * @param InvConsultaItemIncentivo $parameters
     * @return InvConsultaItemIncentivoResponse
     */
    public function InvConsultaItemIncentivo(InvConsultaItemIncentivo $parameters)
    {
      return $this->__soapCall('InvConsultaItemIncentivo', array($parameters));
    }

    /**
     * @param FAC_GENERA_PLANTILLA_PED $parameters
     * @return FAC_GENERA_PLANTILLA_PEDResponse
     */
    public function FAC_GENERA_PLANTILLA_PED(FAC_GENERA_PLANTILLA_PED $parameters)
    {
      return $this->__soapCall('FAC_GENERA_PLANTILLA_PED', array($parameters));
    }

    /**
     * @param InvConsultaDispCroydonista $parameters
     * @return InvConsultaDispCroydonistaResponse
     */
    public function InvConsultaDispCroydonista(InvConsultaDispCroydonista $parameters)
    {
      return $this->__soapCall('InvConsultaDispCroydonista', array($parameters));
    }

    /**
     * @param FAC_ELIMINA_PLANTILLA $parameters
     * @return FAC_ELIMINA_PLANTILLAResponse
     */
    public function FAC_ELIMINA_PLANTILLA(FAC_ELIMINA_PLANTILLA $parameters)
    {
      return $this->__soapCall('FAC_ELIMINA_PLANTILLA', array($parameters));
    }

    /**
     * @param FAC_ELIMINA_PLANTILLA_PED $parameters
     * @return FAC_ELIMINA_PLANTILLA_PEDResponse
     */
    public function FAC_ELIMINA_PLANTILLA_PED(FAC_ELIMINA_PLANTILLA_PED $parameters)
    {
      return $this->__soapCall('FAC_ELIMINA_PLANTILLA_PED', array($parameters));
    }

    /**
     * @param FACPRECIOSEL $parameters
     * @return FACPRECIOSELResponse
     */
    public function FACPRECIOSEL(FACPRECIOSEL $parameters)
    {
      return $this->__soapCall('FACPRECIOSEL', array($parameters));
    }

    /**
     * @param FAC_ACTPED $parameters
     * @return FAC_ACTPEDResponse
     */
    public function FAC_ACTPED(FAC_ACTPED $parameters)
    {
      return $this->__soapCall('FAC_ACTPED', array($parameters));
    }

    /**
     * @param FACVENDCLIENTES $parameters
     * @return FACVENDCLIENTESResponse
     */
    public function FACVENDCLIENTES(FACVENDCLIENTES $parameters)
    {
      return $this->__soapCall('FACVENDCLIENTES', array($parameters));
    }

    /**
     * @param FAC_ACTLIN $parameters
     * @return FAC_ACTLINResponse
     */
    public function FAC_ACTLIN(FAC_ACTLIN $parameters)
    {
      return $this->__soapCall('FAC_ACTLIN', array($parameters));
    }

    /**
     * @param FacConsultaGuia $parameters
     * @return FacConsultaGuiaResponse
     */
    public function FacConsultaGuia(FacConsultaGuia $parameters)
    {
      return $this->__soapCall('FacConsultaGuia', array($parameters));
    }

    /**
     * @param FAC_CONINI $parameters
     * @return FAC_CONINIResponse
     */
    public function FAC_CONINI(FAC_CONINI $parameters)
    {
      return $this->__soapCall('FAC_CONINI', array($parameters));
    }

    /**
     * @param FAC_CONPED $parameters
     * @return FAC_CONPEDResponse
     */
    public function FAC_CONPED(FAC_CONPED $parameters)
    {
      return $this->__soapCall('FAC_CONPED', array($parameters));
    }

    /**
     * @param FAC_CONPEDHIST $parameters
     * @return FAC_CONPEDHISTResponse
     */
    public function FAC_CONPEDHIST(FAC_CONPEDHIST $parameters)
    {
      return $this->__soapCall('FAC_CONPEDHIST', array($parameters));
    }

    /**
     * @param FAC_CONINIP $parameters
     * @return FAC_CONINIPResponse
     */
    public function FAC_CONINIP(FAC_CONINIP $parameters)
    {
      return $this->__soapCall('FAC_CONINIP', array($parameters));
    }

    /**
     * @param FAC_CONGRU $parameters
     * @return FAC_CONGRUResponse
     */
    public function FAC_CONGRU(FAC_CONGRU $parameters)
    {
      return $this->__soapCall('FAC_CONGRU', array($parameters));
    }

    /**
     * @param FAC_CONDET $parameters
     * @return FAC_CONDETResponse
     */
    public function FAC_CONDET(FAC_CONDET $parameters)
    {
      return $this->__soapCall('FAC_CONDET', array($parameters));
    }

    /**
     * @param FAC_CONLIQP $parameters
     * @return FAC_CONLIQPResponse
     */
    public function FAC_CONLIQP(FAC_CONLIQP $parameters)
    {
      return $this->__soapCall('FAC_CONLIQP', array($parameters));
    }

    /**
     * @param FAC_CONPEDINI $parameters
     * @return FAC_CONPEDINIResponse
     */
    public function FAC_CONPEDINI(FAC_CONPEDINI $parameters)
    {
      return $this->__soapCall('FAC_CONPEDINI', array($parameters));
    }

    /**
     * @param FAC_CONLOT $parameters
     * @return FAC_CONLOTResponse
     */
    public function FAC_CONLOT(FAC_CONLOT $parameters)
    {
      return $this->__soapCall('FAC_CONLOT', array($parameters));
    }

    /**
     * @param FAC_CONDIR $parameters
     * @return FAC_CONDIRResponse
     */
    public function FAC_CONDIR(FAC_CONDIR $parameters)
    {
      return $this->__soapCall('FAC_CONDIR', array($parameters));
    }

    /**
     * @param FAC_CONSGRU $parameters
     * @return FAC_CONSGRUResponse
     */
    public function FAC_CONSGRU(FAC_CONSGRU $parameters)
    {
      return $this->__soapCall('FAC_CONSGRU', array($parameters));
    }

    /**
     * @param FAC_ELIMPED $parameters
     * @return FAC_ELIMPEDResponse
     */
    public function FAC_ELIMPED(FAC_ELIMPED $parameters)
    {
      return $this->__soapCall('FAC_ELIMPED', array($parameters));
    }

    /**
     * @param GES_MENIND $parameters
     * @return GES_MENINDResponse
     */
    public function GES_MENIND(GES_MENIND $parameters)
    {
      return $this->__soapCall('GES_MENIND', array($parameters));
    }

    /**
     * @param FAC_CONSUC $parameters
     * @return FAC_CONSUCResponse
     */
    public function FAC_CONSUC(FAC_CONSUC $parameters)
    {
      return $this->__soapCall('FAC_CONSUC', array($parameters));
    }

    /**
     * @param FAC_TOTPED $parameters
     * @return FAC_TOTPEDResponse
     */
    public function FAC_TOTPED(FAC_TOTPED $parameters)
    {
      return $this->__soapCall('FAC_TOTPED', array($parameters));
    }

}
