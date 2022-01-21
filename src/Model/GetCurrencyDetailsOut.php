<?php

namespace DevmeSdk\Model;

class GetCurrencyDetailsOut
{
    /**
     * currency code ISO 4217
     *
     * @var string
     */
    protected $code;
    /**
     * currency name object
     *
     * @var mixed
     */
    protected $name;
    /**
     * currency code ISO 4217
     *
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }
    /**
     * currency code ISO 4217
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
     * currency name object
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * currency name object
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
