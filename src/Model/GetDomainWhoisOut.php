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
     * WHOIS text
     *
     * @var string
     */
    protected $whoisText;
    /**
     * WHOIS JSON
     *
     * @var mixed
     */
    protected $whoisJson;
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
     * WHOIS text
     *
     * @return string
     */
    public function getWhoisText() : string
    {
        return $this->whoisText;
    }
    /**
     * WHOIS text
     *
     * @param string $whoisText
     *
     * @return self
     */
    public function setWhoisText(string $whoisText) : self
    {
        $this->whoisText = $whoisText;
        return $this;
    }
    /**
     * WHOIS JSON
     *
     * @return mixed
     */
    public function getWhoisJson()
    {
        return $this->whoisJson;
    }
    /**
     * WHOIS JSON
     *
     * @param mixed $whoisJson
     *
     * @return self
     */
    public function setWhoisJson($whoisJson) : self
    {
        $this->whoisJson = $whoisJson;
        return $this;
    }
}
