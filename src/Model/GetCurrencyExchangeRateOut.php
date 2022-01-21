<?php

namespace DevmeSdk\Model;

class GetCurrencyExchangeRateOut
{
    /**
     * currency to get exchange rate from
     *
     * @var string
     */
    protected $from;
    /**
     * currency to get exchange rate to
     *
     * @var string
     */
    protected $to;
    /**
     * exchange rate
     *
     * @var float
     */
    protected $exchangeRate;
    /**
     * time of the exchange rate
     *
     * @var string
     */
    protected $rateTime;
    /**
     * currency to get exchange rate from
     *
     * @return string
     */
    public function getFrom() : string
    {
        return $this->from;
    }
    /**
     * currency to get exchange rate from
     *
     * @param string $from
     *
     * @return self
     */
    public function setFrom(string $from) : self
    {
        $this->from = $from;
        return $this;
    }
    /**
     * currency to get exchange rate to
     *
     * @return string
     */
    public function getTo() : string
    {
        return $this->to;
    }
    /**
     * currency to get exchange rate to
     *
     * @param string $to
     *
     * @return self
     */
    public function setTo(string $to) : self
    {
        $this->to = $to;
        return $this;
    }
    /**
     * exchange rate
     *
     * @return float
     */
    public function getExchangeRate() : float
    {
        return $this->exchangeRate;
    }
    /**
     * exchange rate
     *
     * @param float $exchangeRate
     *
     * @return self
     */
    public function setExchangeRate(float $exchangeRate) : self
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }
    /**
     * time of the exchange rate
     *
     * @return string
     */
    public function getRateTime() : string
    {
        return $this->rateTime;
    }
    /**
     * time of the exchange rate
     *
     * @param string $rateTime
     *
     * @return self
     */
    public function setRateTime(string $rateTime) : self
    {
        $this->rateTime = $rateTime;
        return $this;
    }
}
