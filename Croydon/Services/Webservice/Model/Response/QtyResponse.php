<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Croydon\Services\Webservice\Model\Response;

/**
 * Description of QtyResponse
 *
 * @author joncasasq
 */
class QtyResponse
{

    /**
     * @var int
     */
    private $CantDisponible;

    /**
     * @var ExceptionResponse
     */
    private $exceptionResponse;

    /**
     * @return int
     */
    public function getCantDisponible(): int
    {
        return $this->CantDisponible;
    }

    /**
     * @param int $CantDisponible
     * @return QtyResponse
     */
    public function setCantDisponible(int $CantDisponible): QtyResponse
    {
        $this->CantDisponible = $CantDisponible;
        return $this;
    }

    /**
     * @return ExceptionResponse
     */
    public function getExceptionResponse(): ExceptionResponse
    {
        return $this->exceptionResponse;
    }

    /**
     * @param ExceptionResponse $exceptionResponse
     * @return QtyResponse
     */
    public function setExceptionResponse(ExceptionResponse $exceptionResponse): QtyResponse
    {
        $this->exceptionResponse = $exceptionResponse;
        return $this;
    }


}
