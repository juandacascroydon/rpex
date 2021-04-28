<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Croydon\Services\Webservice;

use Croydon\Services\Api\AuroraServiceInterface;
use Croydon\Services\Helper\Data;
use Croydon\Services\Logger\BalanceLogger;
use Croydon\Services\Logger\Logger;
use Croydon\Services\Logger\LoggerInventory;
use Croydon\Services\Webservice\Facturacion\FacActFactura;
use Croydon\Services\Webservice\Facturacion\FacActOrdenPedido;
use Croydon\Services\Webservice\Facturacion\Facturacion;
use Croydon\Services\Webservice\Gauss\FacturacionService;
use Croydon\Services\Webservice\Model\Response\ExceptionResponse;
use Croydon\Services\Webservice\Model\Response\FacConsultaGuiaResponse;
use Croydon\Services\Webservice\Model\Response\OrderResponse;
use Croydon\Services\Webservice\Model\Response\QtyResponse;

/**
 * Description of AuroraService
 *
 * @author joncasasq
 */
class AuroraService implements AuroraServiceInterface
{

    /**
     * @var FacturacionService
     */
    protected $facturationService;

    /**
     * @var Facturacion
     */
    protected $facturation;

    /**
     * @var LoggerInventory
     */
    protected $inventoryLog;

    /**
     * @var Logger
     */
    protected $facturationLog;

    /**
     * @var BalanceLogger
     */
    protected $balanceLog;

    /**
     * @var Data
     */
    protected $data;

    /**
     * AuroraService constructor.
     * @param LoggerInventory $inventoryLog
     * @param Logger $facturationLog
     * @param BalanceLogger $balanceLog
     * @param Data $data
     */
    public function __construct(LoggerInventory $inventoryLog, Logger $facturationLog, BalanceLogger $balanceLog, Data $data)
    {
        $this->inventoryLog = $inventoryLog;
        $this->facturationLog = $facturationLog;
        $this->balanceLog = $balanceLog;
        $this->data = $data;
    }


    /**
     * Init instances
     */
    public function __init()
    {
        $this->facturationLog->info($this->data->getFacturation());
        $this->inventoryLog->info($this->data->getInventory());
        $this->facturationService = new FacturacionService(array('trace' => true), $this->data->getInventory());
        $this->facturation = new Facturacion(array('trace' => true), $this->data->getFacturation());
    }

    /**
     *
     * @param string $uid
     * @param string $cia
     * @param string $year
     * @param string $app
     * @param string $sku
     * @param int $qty
     * @return Model\Response\QtyResponse
     * @throws WebServiceException
     */
    public function getQty(string $uid, string $cia, string $year, string $app, string $sku, int $qty): Model\Response\QtyResponse
    {
        $parameters = new Gauss\InvConsultaDispItemBod();
        $parameters->setAno($year);
        $parameters->setCia($cia);
        $parameters->setCantidad($qty);
        $parameters->setCodItem($sku);
        $parameters->setUid($uid);
        $parameters->setApp($app);
        try {
            $response = $this->transformResponseQty($this->facturationService->InvConsultaDispItemBod($parameters)->getReturn());
            return $response;
        } catch (\Exception $ex) {
            throw new WebServiceException($ex->getMessage());
        }
    }

    /**
     *
     * @param string $uid
     * @param string $cia
     * @param string $year
     * @param string $app
     * @param string $sku
     * @param int $qty
     * @return Model\Response\QtyResponse
     * @throws WebServiceException
     */
    public function getQtyCroydonista(string $uid, string $cia, string $year, string $app, string $sku, int $qty): Model\Response\QtyResponse
    {
        $parameters = new Gauss\InvConsultaDispCroydonista();
        $parameters->setAno($year);
        $parameters->setCia($cia);
        $parameters->setCantidad($qty);
        $parameters->setCodItem($sku);
        $parameters->setUid($uid);
        $parameters->setApp($app);
        try {
            $response = $this->transformResponseQty($this->facturationService->InvConsultaDispCroydonista($parameters)->getReturn());
            return $response;
        } catch (\Exception $ex) {
            throw new WebServiceException($ex->getMessage());
        }
    }

    /**
     *
     * @param Model\Order $order
     * @return Model\Response\OrderResponse
     * @throws WebServiceException
     */
    public function facActOrder(Model\Order $order): Model\Response\OrderResponse
    {
        $facActOrdenPedido = new FacActOrdenPedido();
        $facActOrdenPedido->setCadenaOrdenPedido((new GenerateOrderString($order))->getString(false));
        try {
            $response = $this->transformResponseOrderAndInvoice($this->facturation->FacActOrdenPedido($facActOrdenPedido)->getReturn());
            return $response;
        } catch (\Exception $ex) {
            throw new WebServiceException($ex->getMessage());
        }
    }

    /**
     *
     * @param Model\Order $invoice
     * @return Model\Response\OrderResponse
     * @throws WebServiceException
     */
    public function facActFactura(Model\Order $invoice): Model\Response\OrderResponse
    {
        $facActFactura = new FacActFactura();
        $facActFactura->setCadenaActFactura((new GenerateOrderString($invoice))->getString(true));
        try {
            return $this->transformResponseOrderAndInvoice($this->facturation->FacActFactura($facActFactura)->getReturn());
        } catch (\Exception $ex) {
            throw new WebServiceException($ex->getMessage());
        }
    }

    /**
     * @param string uid
     * @param string cia
     * @param string year
     * @param string app
     * @param string $mageOrder
     * @return Model\Response\FacConsultaGuiaResponse
     * @throws WebServiceException
     */
    public function facConsultaGuia(string $uid, string $cia, string $year, string $app, string $mageOrder): Model\Response\FacConsultaGuiaResponse
    {
        $facConsultaGuia = new \Croydon\Services\Webservice\Gauss\FacConsultaGuia();
        $facConsultaGuia->setUid($uid);
        $facConsultaGuia->setCia($cia);
        $facConsultaGuia->setAno(date($year));
        $facConsultaGuia->setApp($app);
        $facConsultaGuia->setOrden($mageOrder);
        try {
            return $this->transformResponseFacConsultaGuia($this->facturationService->FacConsultaGuia($facConsultaGuia)->getReturn());
        } catch (\Exception $ex) {
            throw new WebServiceException($ex->getMessage());
        }
    }

    /**
     * @param string $response
     * @return Model\Response\QtyResponse
     * @throws WebServiceException
     */
    private function transformResponseQty(string $response): Model\Response\QtyResponse
    {
        $this->__log(true);
        $jsonResponse = json_decode($response);
        $qtyResponse = new QtyResponse();
        if (isset($jsonResponse->CantDisponible)) {
            $qtyResponse->setCantDisponible($jsonResponse->CantDisponible);
        } else if (isset($jsonResponse->EXEPCION)) {
            $exceptionResponse = new ExceptionResponse();
            $exceptionResponse->setCode($jsonResponse->EXEPCION->CODIGO);
            $exceptionResponse->setCode($jsonResponse->EXEPCION->DESCRIPCION);
            $qtyResponse->setExceptionResponse($exceptionResponse);
            throw new WebServiceException($jsonResponse->EXEPCION->DESCRIPCION);
        }
        return $qtyResponse;
    }

    /**
     * @param string $response
     * @return FacConsultaGuiaResponse
     * @throws WebServiceException
     */
    private function transformResponseFacConsultaGuia(string $response): FacConsultaGuiaResponse
    {
        $this->__log(true);
        $jsonResponse = json_decode($response);
        if (isset($jsonResponse->EXEPCION)) {
            throw new WebServiceException($jsonResponse->EXEPCION->DESCRIPCION);
        }
        $facConsultaGuiaResponse = new FacConsultaGuiaResponse();
        $jsonResponse->detalle = json_decode($jsonResponse->detalle, true);
        $reflectionClass = new \ReflectionClass(FacConsultaGuiaResponse::class);
        foreach ($jsonResponse->detalle as $key => $item) {
            $key = str_replace(' ', '', $key);
            $method = 'set' . ucfirst($key);
            if ($reflectionClass->hasProperty($key) && $reflectionClass->hasMethod($method)) {
                $reflectionClass->getMethod($method)->invoke($facConsultaGuiaResponse, $item);
            }
        }
        return $facConsultaGuiaResponse;
    }

    /**
     * @param string $response
     * @return OrderResponse
     * @throws WebServiceException
     */
    private function transformResponseOrderAndInvoice(string $response): OrderResponse
    {
        $this->__log(false);
        $jsonResponse = json_decode($response);
        $orderResponse = new OrderResponse();
        if (isset($jsonResponse->coddoc)) {
            $orderResponse->setCoddoc($jsonResponse->coddoc);
            $orderResponse->setNumdoc($jsonResponse->numdoc);
            $orderResponse->setSucdoc($jsonResponse->Sucdoc);
            $orderResponse->setMsg($jsonResponse->msg);
            if ($orderResponse->getCoddoc() == 'ER') {
                throw new WebServiceException($orderResponse->getMsg());
            }
        } elseif (isset($jsonResponse->EXCEPTION)) {
            $exceptionResponse = new ExceptionResponse();
            $exceptionResponse->setCode($jsonResponse->EXCEPTION->CODIGO);
            $exceptionResponse->setCode($jsonResponse->EXCEPTION->DESCRIPCION);
            $orderResponse->setExceptionResponse($exceptionResponse);
            throw new WebServiceException($jsonResponse->EXCEPTION->DESCRIPCION);
        }
        return $orderResponse;
    }

    public function __log($isGauss = true)
    {
        if ($isGauss) {
            $this->inventoryLog->info('Request');
            $this->inventoryLog->info($this->facturationService->__getLastRequest());
            $this->inventoryLog->info('Response');
            $this->inventoryLog->info($this->facturationService->__getLastResponse());
        } else {
            $this->facturationLog->info('Request');
            $this->facturationLog->info($this->facturation->__getLastRequest());
            $this->facturationLog->info('Response');
            $this->facturationLog->info($this->facturation->__getLastResponse());
        }
    }

}
