<?php

namespace DevmeSdk\Model;

class HttpErrorOut
{
    /**
     * http status code
     *
     * @var float
     */
    protected $status;
    /**
     * error name
     *
     * @var string
     */
    protected $name;
    /**
     * error message
     *
     * @var string
     */
    protected $message;
    /**
     * array of errors
     *
     * @var Error[]
     */
    protected $errors;
    /**
     * http status code
     *
     * @return float
     */
    public function getStatus() : float
    {
        return $this->status;
    }
    /**
     * http status code
     *
     * @param float $status
     *
     * @return self
     */
    public function setStatus(float $status) : self
    {
        $this->status = $status;
        return $this;
    }
    /**
     * error name
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * error name
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
    /**
     * error message
     *
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * error message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message) : self
    {
        $this->message = $message;
        return $this;
    }
    /**
     * array of errors
     *
     * @return Error[]
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
    /**
     * array of errors
     *
     * @param Error[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors) : self
    {
        $this->errors = $errors;
        return $this;
    }
}
