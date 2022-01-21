<?php

namespace Devme\Model;

class GetEmailDetailsOut
{
    /**
     * email address
     *
     * @var string
     */
    protected $email;
    /**
     * is the domain is valid with dns MX record
     *
     * @var bool
     */
    protected $validMx;
    /**
     * is email address valid with SMTP Connect and Reply
     *
     * @var bool
     */
    protected $validSmtp;
    /**
     * is email valid format
     *
     * @var bool
     */
    protected $validFormat;
    /**
     * is disposable email
     *
     * @var bool
     */
    protected $isDisposable;
    /**
     * is free email
     *
     * @var bool
     */
    protected $isFree;
    /**
     * domain age
     *
     * @var float
     */
    protected $domainAge;
    /**
     * quality score
     *
     * @var float
     */
    protected $score;
    /**
     * email address
     *
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
    /**
     * email address
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
     * is the domain is valid with dns MX record
     *
     * @return bool
     */
    public function getValidMx() : bool
    {
        return $this->validMx;
    }
    /**
     * is the domain is valid with dns MX record
     *
     * @param bool $validMx
     *
     * @return self
     */
    public function setValidMx(bool $validMx) : self
    {
        $this->validMx = $validMx;
        return $this;
    }
    /**
     * is email address valid with SMTP Connect and Reply
     *
     * @return bool
     */
    public function getValidSmtp() : bool
    {
        return $this->validSmtp;
    }
    /**
     * is email address valid with SMTP Connect and Reply
     *
     * @param bool $validSmtp
     *
     * @return self
     */
    public function setValidSmtp(bool $validSmtp) : self
    {
        $this->validSmtp = $validSmtp;
        return $this;
    }
    /**
     * is email valid format
     *
     * @return bool
     */
    public function getValidFormat() : bool
    {
        return $this->validFormat;
    }
    /**
     * is email valid format
     *
     * @param bool $validFormat
     *
     * @return self
     */
    public function setValidFormat(bool $validFormat) : self
    {
        $this->validFormat = $validFormat;
        return $this;
    }
    /**
     * is disposable email
     *
     * @return bool
     */
    public function getIsDisposable() : bool
    {
        return $this->isDisposable;
    }
    /**
     * is disposable email
     *
     * @param bool $isDisposable
     *
     * @return self
     */
    public function setIsDisposable(bool $isDisposable) : self
    {
        $this->isDisposable = $isDisposable;
        return $this;
    }
    /**
     * is free email
     *
     * @return bool
     */
    public function getIsFree() : bool
    {
        return $this->isFree;
    }
    /**
     * is free email
     *
     * @param bool $isFree
     *
     * @return self
     */
    public function setIsFree(bool $isFree) : self
    {
        $this->isFree = $isFree;
        return $this;
    }
    /**
     * domain age
     *
     * @return float
     */
    public function getDomainAge() : float
    {
        return $this->domainAge;
    }
    /**
     * domain age
     *
     * @param float $domainAge
     *
     * @return self
     */
    public function setDomainAge(float $domainAge) : self
    {
        $this->domainAge = $domainAge;
        return $this;
    }
    /**
     * quality score
     *
     * @return float
     */
    public function getScore() : float
    {
        return $this->score;
    }
    /**
     * quality score
     *
     * @param float $score
     *
     * @return self
     */
    public function setScore(float $score) : self
    {
        $this->score = $score;
        return $this;
    }
}
