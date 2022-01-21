<?php

namespace DevmeSdk\Exception;

class V1GetCountryDetailsUnauthorizedException extends UnauthorizedException
{
    private $httpErrorOut;
    public function __construct(\DevmeSdk\Model\HttpErrorOut $httpErrorOut)
    {
        parent::__construct('unauthorized request', 401);
        $this->httpErrorOut = $httpErrorOut;
    }
    public function getHttpErrorOut()
    {
        return $this->httpErrorOut;
    }
}
