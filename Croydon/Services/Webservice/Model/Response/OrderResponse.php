<?php

namespace Croydon\Services\Webservice\Model\Response;

/**
 * Description of OrderResponse
 *
 * @author joncasasq
 */
class OrderResponse
{

    /**
     * @var string
     */
    private $coddoc;
    /**
     * @var string
     */
    private $sucdoc;
    /**
     * @var string
     */
    private $numdoc;
    /**
     * @var string
     */
    private $msg;
    /**
     * @var ExceptionResponse
     */
    private $exceptionResponse;

    /**
     * @return string
     */
    public function getCoddoc(): string
    {
        return $this->coddoc;
    }

    /**
     * @param string $coddoc
     * @return OrderResponse
     */
    public function setCoddoc(string $coddoc): OrderResponse
    {
        $this->coddoc = $coddoc;
        return $this;
    }

    /**
     * @return string
     */
    public function getSucdoc(): string
    {
        return $this->sucdoc;
    }

    /**
     * @param string $sucdoc
     * @return OrderResponse
     */
    public function setSucdoc(string $sucdoc): OrderResponse
    {
        $this->sucdoc = $sucdoc;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumdoc(): string
    {
        return $this->numdoc;
    }

    /**
     * @param string $numdoc
     * @return OrderResponse
     */
    public function setNumdoc(string $numdoc): OrderResponse
    {
        $this->numdoc = $numdoc;
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
     * @return OrderResponse
     */
    public function setExceptionResponse(ExceptionResponse $exceptionResponse): OrderResponse
    {
        $this->exceptionResponse = $exceptionResponse;
        return $this;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     * @return OrderResponse
     */
    public function setMsg(string $msg): OrderResponse
    {
        $this->msg = $msg;
        return $this;
    }


}
