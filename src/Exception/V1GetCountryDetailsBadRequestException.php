<?php

namespace DevmeSdk\Exception;

class V1GetCountryDetailsBadRequestException extends BadRequestException
{
    private $httpErrorOut;
    public function __construct(\DevmeSdk\Model\HttpErrorOut $httpErrorOut)
    {
        parent::__construct('invalid request', 400);
        $this->httpErrorOut = $httpErrorOut;
    }
    public function getHttpErrorOut()
    {
        return $this->httpErrorOut;
    }
}
