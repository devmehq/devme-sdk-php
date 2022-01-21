<?php

namespace DevmeSdk\Model;

class GetIpDetailsCityOut
{
    /**
     * Accuracy Radius
     *
     * @var float
     */
    protected $accuracyRadius;
    /**
     * Latitude
     *
     * @var float
     */
    protected $latitude;
    /**
     * Longitude
     *
     * @var string
     */
    protected $longitude;
    /**
     * Time Zone
     *
     * @var string
     */
    protected $timeZone;
    /**
     * City Name
     *
     * @var string
     */
    protected $name;
    /**
     * Accuracy Radius
     *
     * @return float
     */
    public function getAccuracyRadius() : float
    {
        return $this->accuracyRadius;
    }
    /**
     * Accuracy Radius
     *
     * @param float $accuracyRadius
     *
     * @return self
     */
    public function setAccuracyRadius(float $accuracyRadius) : self
    {
        $this->accuracyRadius = $accuracyRadius;
        return $this;
    }
    /**
     * Latitude
     *
     * @return float
     */
    public function getLatitude() : float
    {
        return $this->latitude;
    }
    /**
     * Latitude
     *
     * @param float $latitude
     *
     * @return self
     */
    public function setLatitude(float $latitude) : self
    {
        $this->latitude = $latitude;
        return $this;
    }
    /**
     * Longitude
     *
     * @return string
     */
    public function getLongitude() : string
    {
        return $this->longitude;
    }
    /**
     * Longitude
     *
     * @param string $longitude
     *
     * @return self
     */
    public function setLongitude(string $longitude) : self
    {
        $this->longitude = $longitude;
        return $this;
    }
    /**
     * Time Zone
     *
     * @return string
     */
    public function getTimeZone() : string
    {
        return $this->timeZone;
    }
    /**
     * Time Zone
     *
     * @param string $timeZone
     *
     * @return self
     */
    public function setTimeZone(string $timeZone) : self
    {
        $this->timeZone = $timeZone;
        return $this;
    }
    /**
     * City Name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * City Name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }
}