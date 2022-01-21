<?php

namespace DevmeSdk\Model;

class WhoAmIOut
{
    /**
     * 
     *
     * @var string
     */
    protected $userId;
    /**
     * 
     *
     * @var string
     */
    protected $email;
    /**
     * 
     *
     * @var string
     */
    protected $username;
    /**
     * 
     *
     * @var string
     */
    protected $reqIpAddress;
    /**
     * 
     *
     * @var string
     */
    protected $reqIpCountry;
    /**
     * 
     *
     * @var string
     */
    protected $reqUserAgent;
    /**
     * 
     *
     * @return string
     */
    public function getUserId() : string
    {
        return $this->userId;
    }
    /**
     * 
     *
     * @param string $userId
     *
     * @return self
     */
    public function setUserId(string $userId) : self
    {
        $this->userId = $userId;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
    /**
     * 
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email) : self
    {
        $this->email = $email;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }
    /**
     * 
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username) : self
    {
        $this->username = $username;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getReqIpAddress() : string
    {
        return $this->reqIpAddress;
    }
    /**
     * 
     *
     * @param string $reqIpAddress
     *
     * @return self
     */
    public function setReqIpAddress(string $reqIpAddress) : self
    {
        $this->reqIpAddress = $reqIpAddress;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getReqIpCountry() : string
    {
        return $this->reqIpCountry;
    }
    /**
     * 
     *
     * @param string $reqIpCountry
     *
     * @return self
     */
    public function setReqIpCountry(string $reqIpCountry) : self
    {
        $this->reqIpCountry = $reqIpCountry;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getReqUserAgent() : string
    {
        return $this->reqUserAgent;
    }
    /**
     * 
     *
     * @param string $reqUserAgent
     *
     * @return self
     */
    public function setReqUserAgent(string $reqUserAgent) : self
    {
        $this->reqUserAgent = $reqUserAgent;
        return $this;
    }
}