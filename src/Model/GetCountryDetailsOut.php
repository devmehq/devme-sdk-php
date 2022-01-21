<?php

namespace DevmeSdk\Model;

class GetCountryDetailsOut
{
    /**
     * country code ISO 4217
     *
     * @var string
     */
    protected $code;
    /**
     * country name
     *
     * @var string
     */
    protected $name;
    /**
     * country code ISO 4217
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
    /**
     * country code ISO 4217
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code) : self
    {
        $this->code = $code;
        return $this;
    }
    /**
     * country name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * country name
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