<?php

namespace Devme\Exception;

class V1ConvertCurrencyBadRequestException extends BadRequestException
{
    private $httpErrorOut;
    public function __construct(\Devme\Model\HttpErrorOut $httpErrorOut)
    {
        parent::__construct('invalid request', 400);
        $this->httpErrorOut = $httpErrorOut;
    }
    public function getHttpErrorOut()
    {
        return $this->httpErrorOut;
    }
}
