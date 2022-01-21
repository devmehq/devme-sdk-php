<?php

namespace DevmeSdk\Model;

class GetDomainWhoisOut
{
    /**
     * Domain name
     *
     * @var string
     */
    protected $domain;
    /**
     * Domain details
     *
     * @var string
     */
    protected $details;
    /**
     * Domain name
     *
     * @return string
     */
    public function getDomain() : string
    {
        return $this->domain;
    }
    /**
     * Domain name
     *
     * @param string $domain
     *
     * @return self
     */
    public function setDomain(string $domain) : self
    {
        $this->domain = $domain;
        return $this;
    }
    /**
     * Domain details
     *
     * @return string
     */
    public function getDetails() : string
    {
        return $this->details;
    }
    /**
     * Domain details
     *
     * @param string $details
     *
     * @return self
     */
    public function setDetails(string $details) : self
    {
        $this->details = $details;
        return $this;
    }
}
