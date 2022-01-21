<?php

namespace DevmeSdk\Model;

class GetPhoneDetailsOut
{
    /**
     * phone number
     *
     * @var string
     */
    protected $number;
    /**
     * is phone number valid
     *
     * @var bool
     */
    protected $valid;
    /**
     * country code associated with phone number ISO 3166-1 alpha-2
     *
     * @var string
     */
    protected $country;
    /**
     * country calling code associated with phone number
     *
     * @var string
     */
    protected $callingCode;
    /**
     * national number associated with phone number
     *
     * @var string
     */
    protected $nationalNumber;
    /**
     * phone number type
     *
     * @var string
     */
    protected $type;
    /**
     * phone number
     *
     * @return string
     */
    public function getNumber() : string
    {
        return $this->number;
    }
    /**
     * phone number
     *
     * @param string $number
     *
     * @return self
     */
    public function setNumber(string $number) : self
    {
        $this->number = $number;
        return $this;
    }
    /**
     * is phone number valid
     *
     * @return bool
     */
    public function getValid() : bool
    {
        return $this->valid;
    }
    /**
     * is phone number valid
     *
     * @param bool $valid
     *
     * @return self
     */
    public function setValid(bool $valid) : self
    {
        $this->valid = $valid;
        return $this;
    }
    /**
     * country code associated with phone number ISO 3166-1 alpha-2
     *
     * @return string
     */
    public function getCountry() : string
    {
        return $this->country;
    }
    /**
     * country code associated with phone number ISO 3166-1 alpha-2
     *
     * @param string $country
     *
     * @return self
     */
    public function setCountry(string $country) : self
    {
        $this->country = $country;
        return $this;
    }
    /**
     * country calling code associated with phone number
     *
     * @return string
     */
    public function getCallingCode() : string
    {
        return $this->callingCode;
    }
    /**
     * country calling code associated with phone number
     *
     * @param string $callingCode
     *
     * @return self
     */
    public function setCallingCode(string $callingCode) : self
    {
        $this->callingCode = $callingCode;
        return $this;
    }
    /**
     * national number associated with phone number
     *
     * @return string
     */
    public function getNationalNumber() : string
    {
        return $this->nationalNumber;
    }
    /**
     * national number associated with phone number
     *
     * @param string $nationalNumber
     *
     * @return self
     */
    public function setNationalNumber(string $nationalNumber) : self
    {
        $this->nationalNumber = $nationalNumber;
        return $this;
    }
    /**
     * phone number type
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
    /**
     * phone number type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type) : self
    {
        $this->type = $type;
        return $this;
    }
}