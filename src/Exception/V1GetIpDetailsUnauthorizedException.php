<?php

namespace DevmeSdk\Exception;

class V1GetIpDetailsUnauthorizedException extends UnauthorizedException
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