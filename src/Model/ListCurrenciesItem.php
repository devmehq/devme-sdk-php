<?php

namespace Devme\Model;

class ListCurrenciesItem
{
    /**
     * currency code ISO 4217
     *
     * @var string
     */
    protected $code;
    /**
     * banknotes
     *
     * @var mixed
     */
    protected $banknotes;
    /**
     * coins
     *
     * @var mixed
     */
    protected $coins;
    /**
     * iso
     *
     * @var mixed
     */
    protected $iso;
    /**
     * name
     *
     * @var mixed
     */
    protected $name;
    /**
     * type of currency
     *
     * @var string
     */
    protected $type;
    /**
     * units
     *
     * @var mixed
     */
    protected $units;
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
     * banknotes
     *
     * @return mixed
     */
    public function getBanknotes()
    {
        return $this->banknotes;
    }
    /**
     * banknotes
     *
     * @param mixed $banknotes
     *
     * @return self
     */
    public function setBanknotes($banknotes) : self
    {
        $this->banknotes = $banknotes;
        return $this;
    }
    /**
     * coins
     *
     * @return mixed
     */
    public function getCoins()
    {
        return $this->coins;
    }
    /**
     * coins
     *
     * @param mixed $coins
     *
     * @return self
     */
    public function setCoins($coins) : self
    {
        $this->coins = $coins;
        return $this;
    }
    /**
     * iso
     *
     * @return mixed
     */
    public function getIso()
    {
        return $this->iso;
    }
    /**
     * iso
     *
     * @param mixed $iso
     *
     * @return self
     */
    public function setIso($iso) : self
    {
        $this->iso = $iso;
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
    /**
     * type of currency
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
    /**
     * type of currency
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
    /**
     * units
     *
     * @return mixed
     */
    public function getUnits()
    {
        return $this->units;
    }
    /**
     * units
     *
     * @param mixed $units
     *
     * @return self
     */
    public function setUnits($units) : self
    {
        $this->units = $units;
        return $this;
    }
}
