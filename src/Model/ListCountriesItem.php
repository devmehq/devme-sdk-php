<?php

namespace Devme\Model;

class ListCountriesItem
{
    /**
     * country code ISO 4217
     *
     * @var string
     */
    protected $code;
    /**
     * name
     *
     * @var mixed
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
     * name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * name
     *
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name) : self
    {
        $this->name = $name;
        return $this;
    }
}
