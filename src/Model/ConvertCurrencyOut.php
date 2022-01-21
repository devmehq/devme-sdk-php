<?php

namespace DevmeSdk\Model;

class ConvertCurrencyOut
{
    /**
     * currency to convert from
     *
     * @var string
     */
    protected $from;
    /**
     * currency to convert to
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
     * original amount input
     *
     * @var float
     */
    protected $originalAmount;
    /**
     * converted amount
     *
     * @var float
     */
    protected $convertedAmount;
    /**
     * converted amount in text
     *
     * @var string
     */
    protected $convertedText;
    /**
     * currency to convert from
     *
     * @return string
     */
    public function getFrom() : string
    {
        return $this->from;
    }
    /**
     * currency to convert from
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
     * currency to convert to
     *
     * @return string
     */
    public function getTo() : string
    {
        return $this->to;
    }
    /**
     * currency to convert to
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
    /**
     * original amount input
     *
     * @return float
     */
    public function getOriginalAmount() : float
    {
        return $this->originalAmount;
    }
    /**
     * original amount input
     *
     * @param float $originalAmount
     *
     * @return self
     */
    public function setOriginalAmount(float $originalAmount) : self
    {
        $this->originalAmount = $originalAmount;
        return $this;
    }
    /**
     * converted amount
     *
     * @return float
     */
    public function getConvertedAmount() : float
    {
        return $this->convertedAmount;
    }
    /**
     * converted amount
     *
     * @param float $convertedAmount
     *
     * @return self
     */
    public function setConvertedAmount(float $convertedAmount) : self
    {
        $this->convertedAmount = $convertedAmount;
        return $this;
    }
    /**
     * converted amount in text
     *
     * @return string
     */
    public function getConvertedText() : string
    {
        return $this->convertedText;
    }
    /**
     * converted amount in text
     *
     * @param string $convertedText
     *
     * @return self
     */
    public function setConvertedText(string $convertedText) : self
    {
        $this->convertedText = $convertedText;
        return $this;
    }
}