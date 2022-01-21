<?php

namespace DevmeSdk\Model;

class Error
{
    /**
     * error value
     *
     * @var mixed
     */
    protected $value;
    /**
     * error message
     *
     * @var string
     */
    protected $msg;
    /**
     * error parameters
     *
     * @var string
     */
    protected $param;
    /**
     * location of the error
     *
     * @var string
     */
    protected $location;
    /**
     * error value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * error value
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value) : self
    {
        $this->value = $value;
        return $this;
    }
    /**
     * error message
     *
     * @return string
     */
    public function getMsg() : string
    {
        return $this->msg;
    }
    /**
     * error message
     *
     * @param string $msg
     *
     * @return self
     */
    public function setMsg(string $msg) : self
    {
        $this->msg = $msg;
        return $this;
    }
    /**
     * error parameters
     *
     * @return string
     */
    public function getParam() : string
    {
        return $this->param;
    }
    /**
     * error parameters
     *
     * @param string $param
     *
     * @return self
     */
    public function setParam(string $param) : self
    {
        $this->param = $param;
        return $this;
    }
    /**
     * location of the error
     *
     * @return string
     */
    public function getLocation() : string
    {
        return $this->location;
    }
    /**
     * location of the error
     *
     * @param string $location
     *
     * @return self
     */
    public function setLocation(string $location) : self
    {
        $this->location = $location;
        return $this;
    }
}