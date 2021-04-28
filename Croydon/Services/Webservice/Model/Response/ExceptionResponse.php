<?php


namespace Croydon\Services\Webservice\Model\Response;


class ExceptionResponse
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $description;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return ExceptionResponse
     */
    public function setCode(string $code): ExceptionResponse
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ExceptionResponse
     */
    public function setDescription(string $description): ExceptionResponse
    {
        $this->description = $description;
        return $this;
    }
}