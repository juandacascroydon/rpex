<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Croydon\Services\Webservice\Model\Response;

/**
 * Description of TrackingResponse
 *
 * @author joncasasq
 */
class FacConsultaGuiaResponse
{

    private $SucursalPedido;
    private $NumeroPedido;
    private $SucursalFactura;
    private $NumeroFactura;
    private $Estado;
    private $FechaLiberacion;
    private $HoraLiberacion;
    private $UsuarioLiberacion;
    private $IndicadorAsignacion;
    private $FechaAsignacion;
    private $HoraAsignacion;
    private $UsuarioAsignacion;
    private $IndicadorPicking;
    private $FechaPicking;
    private $HoraPicking;
    private $UsuarioPicking;
    private $IndicadorCertificacion;
    private $FechaCertificacion;
    private $HoraCertificacion;
    private $UsuarioCertificacion;
    private $IndicadorDespacho;
    private $FechaDespacho;
    private $HoraDespacho;
    private $UsuarioDespacho;
    private $TipodeLiberacion;
    private $EstadodeCertificacion;
    private $Estadodocumento;
    private $CantidaddeReferencias;
    private $CantidaddePares;
    private $Pesototal;
    private $Numerodeguia;
    private $CriteriodeLiberacion;

    /**
     * @return mixed
     */
    public function getSucursalPedido()
    {
        return $this->SucursalPedido;
    }

    /**
     * @param mixed $SucursalPedido
     * @return FacConsultaGuiaResponse
     */
    public function setSucursalPedido($SucursalPedido)
    {
        $this->SucursalPedido = $SucursalPedido;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroPedido()
    {
        return $this->NumeroPedido;
    }

    /**
     * @param mixed $NumeroPedido
     * @return FacConsultaGuiaResponse
     */
    public function setNumeroPedido($NumeroPedido)
    {
        $this->NumeroPedido = $NumeroPedido;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSucursalFactura()
    {
        return $this->SucursalFactura;
    }

    /**
     * @param mixed $SucursalFactura
     * @return FacConsultaGuiaResponse
     */
    public function setSucursalFactura($SucursalFactura)
    {
        $this->SucursalFactura = $SucursalFactura;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroFactura()
    {
        return $this->NumeroFactura;
    }

    /**
     * @param mixed $NumeroFactura
     * @return FacConsultaGuiaResponse
     */
    public function setNumeroFactura($NumeroFactura)
    {
        $this->NumeroFactura = $NumeroFactura;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     * @return FacConsultaGuiaResponse
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaLiberacion()
    {
        return $this->FechaLiberacion;
    }

    /**
     * @param mixed $FechaLiberacion
     * @return FacConsultaGuiaResponse
     */
    public function setFechaLiberacion($FechaLiberacion)
    {
        $this->FechaLiberacion = $FechaLiberacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraLiberacion()
    {
        return $this->HoraLiberacion;
    }

    /**
     * @param mixed $HoraLiberacion
     * @return FacConsultaGuiaResponse
     */
    public function setHoraLiberacion($HoraLiberacion)
    {
        $this->HoraLiberacion = $HoraLiberacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioLiberacion()
    {
        return $this->UsuarioLiberacion;
    }

    /**
     * @param mixed $UsuarioLiberacion
     * @return FacConsultaGuiaResponse
     */
    public function setUsuarioLiberacion($UsuarioLiberacion)
    {
        $this->UsuarioLiberacion = $UsuarioLiberacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicadorAsignacion()
    {
        return $this->IndicadorAsignacion;
    }

    /**
     * @param mixed $IndicadorAsignacion
     * @return FacConsultaGuiaResponse
     */
    public function setIndicadorAsignacion($IndicadorAsignacion)
    {
        $this->IndicadorAsignacion = $IndicadorAsignacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaAsignacion()
    {
        return $this->FechaAsignacion;
    }

    /**
     * @param mixed $FechaAsignacion
     * @return FacConsultaGuiaResponse
     */
    public function setFechaAsignacion($FechaAsignacion)
    {
        $this->FechaAsignacion = $FechaAsignacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraAsignacion()
    {
        return $this->HoraAsignacion;
    }

    /**
     * @param mixed $HoraAsignacion
     * @return FacConsultaGuiaResponse
     */
    public function setHoraAsignacion($HoraAsignacion)
    {
        $this->HoraAsignacion = $HoraAsignacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioAsignacion()
    {
        return $this->UsuarioAsignacion;
    }

    /**
     * @param mixed $UsuarioAsignacion
     * @return FacConsultaGuiaResponse
     */
    public function setUsuarioAsignacion($UsuarioAsignacion)
    {
        $this->UsuarioAsignacion = $UsuarioAsignacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicadorPicking()
    {
        return $this->IndicadorPicking;
    }

    /**
     * @param mixed $IndicadorPicking
     * @return FacConsultaGuiaResponse
     */
    public function setIndicadorPicking($IndicadorPicking)
    {
        $this->IndicadorPicking = $IndicadorPicking;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaPicking()
    {
        return $this->FechaPicking;
    }

    /**
     * @param mixed $FechaPicking
     * @return FacConsultaGuiaResponse
     */
    public function setFechaPicking($FechaPicking)
    {
        $this->FechaPicking = $FechaPicking;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraPicking()
    {
        return $this->HoraPicking;
    }

    /**
     * @param mixed $HoraPicking
     * @return FacConsultaGuiaResponse
     */
    public function setHoraPicking($HoraPicking)
    {
        $this->HoraPicking = $HoraPicking;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioPicking()
    {
        return $this->UsuarioPicking;
    }

    /**
     * @param mixed $UsuarioPicking
     * @return FacConsultaGuiaResponse
     */
    public function setUsuarioPicking($UsuarioPicking)
    {
        $this->UsuarioPicking = $UsuarioPicking;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicadorCertificacion()
    {
        return $this->IndicadorCertificacion;
    }

    /**
     * @param mixed $IndicadorCertificacion
     * @return FacConsultaGuiaResponse
     */
    public function setIndicadorCertificacion($IndicadorCertificacion)
    {
        $this->IndicadorCertificacion = $IndicadorCertificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaCertificacion()
    {
        return $this->FechaCertificacion;
    }

    /**
     * @param mixed $FechaCertificacion
     * @return FacConsultaGuiaResponse
     */
    public function setFechaCertificacion($FechaCertificacion)
    {
        $this->FechaCertificacion = $FechaCertificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraCertificacion()
    {
        return $this->HoraCertificacion;
    }

    /**
     * @param mixed $HoraCertificacion
     * @return FacConsultaGuiaResponse
     */
    public function setHoraCertificacion($HoraCertificacion)
    {
        $this->HoraCertificacion = $HoraCertificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioCertificacion()
    {
        return $this->UsuarioCertificacion;
    }

    /**
     * @param mixed $UsuarioCertificacion
     * @return FacConsultaGuiaResponse
     */
    public function setUsuarioCertificacion($UsuarioCertificacion)
    {
        $this->UsuarioCertificacion = $UsuarioCertificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicadorDespacho()
    {
        return $this->IndicadorDespacho;
    }

    /**
     * @param mixed $IndicadorDespacho
     * @return FacConsultaGuiaResponse
     */
    public function setIndicadorDespacho($IndicadorDespacho)
    {
        $this->IndicadorDespacho = $IndicadorDespacho;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaDespacho()
    {
        return $this->FechaDespacho;
    }

    /**
     * @param mixed $FechaDespacho
     * @return FacConsultaGuiaResponse
     */
    public function setFechaDespacho($FechaDespacho)
    {
        $this->FechaDespacho = $FechaDespacho;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraDespacho()
    {
        return $this->HoraDespacho;
    }

    /**
     * @param mixed $HoraDespacho
     * @return FacConsultaGuiaResponse
     */
    public function setHoraDespacho($HoraDespacho)
    {
        $this->HoraDespacho = $HoraDespacho;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioDespacho()
    {
        return $this->UsuarioDespacho;
    }

    /**
     * @param mixed $UsuarioDespacho
     * @return FacConsultaGuiaResponse
     */
    public function setUsuarioDespacho($UsuarioDespacho)
    {
        $this->UsuarioDespacho = $UsuarioDespacho;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipodeLiberacion()
    {
        return $this->TipodeLiberacion;
    }

    /**
     * @param mixed $TipodeLiberacion
     * @return FacConsultaGuiaResponse
     */
    public function setTipodeLiberacion($TipodeLiberacion)
    {
        $this->TipodeLiberacion = $TipodeLiberacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadodeCertificacion()
    {
        return $this->EstadodeCertificacion;
    }

    /**
     * @param mixed $EstadodeCertificacion
     * @return FacConsultaGuiaResponse
     */
    public function setEstadodeCertificacion($EstadodeCertificacion)
    {
        $this->EstadodeCertificacion = $EstadodeCertificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadodocumento()
    {
        return $this->Estadodocumento;
    }

    /**
     * @param mixed $Estadodocumento
     * @return FacConsultaGuiaResponse
     */
    public function setEstadodocumento($Estadodocumento)
    {
        $this->Estadodocumento = $Estadodocumento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidaddeReferencias()
    {
        return $this->CantidaddeReferencias;
    }

    /**
     * @param mixed $CantidaddeReferencias
     * @return FacConsultaGuiaResponse
     */
    public function setCantidaddeReferencias($CantidaddeReferencias)
    {
        $this->CantidaddeReferencias = $CantidaddeReferencias;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidaddePares()
    {
        return $this->CantidaddePares;
    }

    /**
     * @param mixed $CantidaddePares
     * @return FacConsultaGuiaResponse
     */
    public function setCantidaddePares($CantidaddePares)
    {
        $this->CantidaddePares = $CantidaddePares;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesototal()
    {
        return $this->Pesototal;
    }

    /**
     * @param mixed $Pesototal
     * @return FacConsultaGuiaResponse
     */
    public function setPesototal($Pesototal)
    {
        $this->Pesototal = $Pesototal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumerodeguia()
    {
        return $this->Numerodeguia;
    }

    /**
     * @param mixed $Numerodeguia
     * @return FacConsultaGuiaResponse
     */
    public function setNumerodeguia($Numerodeguia)
    {
        $this->Numerodeguia = $Numerodeguia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteriodeLiberacion()
    {
        return $this->CriteriodeLiberacion;
    }

    /**
     * @param mixed $CriteriodeLiberacion
     * @return FacConsultaGuiaResponse
     */
    public function setCriteriodeLiberacion($CriteriodeLiberacion)
    {
        $this->CriteriodeLiberacion = $CriteriodeLiberacion;
        return $this;
    }

}
