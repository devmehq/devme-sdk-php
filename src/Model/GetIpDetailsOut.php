<?php

namespace DevmeSdk\Model;

class GetIpDetailsOut
{
    /**
     * IP Address
     *
     * @var string
     */
    protected $ip;
    /**
     * Country Code ISO 3166-1 Alpha-2
     *
     * @var string
     */
    protected $countryCode;
    /**
     * Registered Country Code ISO 3166-1 Alpha-2
     *
     * @var string
     */
    protected $registeredCountryCode;
    /**
     * autonomous system number
     *
     * @var string
     */
    protected $asn;
    /**
     * autonomous system organization
     *
     * @var string
     */
    protected $aso;
    /**
     *
     *
     * @var GetIpDetailsCityOut
     */
    protected $city;
    /**
     * IP Address
     *
     * @return string
     */
    public function getIp() : string
    {
        return $this->ip;
    }
    /**
     * IP Address
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp(string $ip) : self
    {
        $this->ip = $ip;
        return $this;
    }
    /**
     * Country Code ISO 3166-1 Alpha-2
     *
     * @return string
     */
    public function getCountryCode() : string
    {
        return $this->countryCode;
    }
    /**
     * Country Code ISO 3166-1 Alpha-2
     *
     * @param string $countryCode
     *
     * @return self
     */
    public function setCountryCode(string $countryCode) : self
    {
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Registered Country Code ISO 3166-1 Alpha-2
     *
     * @return string
     */
    public function getRegisteredCountryCode() : string
    {
        return $this->registeredCountryCode;
    }
    /**
     * Registered Country Code ISO 3166-1 Alpha-2
     *
     * @param string $registeredCountryCode
     *
     * @return self
     */
    public function setRegisteredCountryCode(string $registeredCountryCode) : self
    {
        $this->registeredCountryCode = $registeredCountryCode;
        return $this;
    }
    /**
     * autonomous system number
     *
     * @return string
     */
    public function getAsn() : string
    {
        return $this->asn;
    }
    /**
     * autonomous system number
     *
     * @param string $asn
     *
     * @return self
     */
    public function setAsn(string $asn) : self
    {
        $this->asn = $asn;
        return $this;
    }
    /**
     * autonomous system organization
     *
     * @return string
     */
    public function getAso() : string
    {
        return $this->aso;
    }
    /**
     * autonomous system organization
     *
     * @param string $aso
     *
     * @return self
     */
    public function setAso(string $aso) : self
    {
        $this->aso = $aso;
        return $this;
    }
    /**
     *
     *
     * @return GetIpDetailsCityOut
     */
    public function getCity() : GetIpDetailsCityOut
    {
        return $this->city;
    }
    /**
     *
     *
     * @param GetIpDetailsCityOut $city
     *
     * @return self
     */
    public function setCity(GetIpDetailsCityOut $city) : self
    {
        $this->city = $city;
        return $this;
    }
}
