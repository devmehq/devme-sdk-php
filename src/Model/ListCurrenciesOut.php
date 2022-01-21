<?php

namespace DevmeSdk\Model;

class ListCurrenciesOut
{
    /**
     * page number
     *
     * @var float
     */
    protected $page;
    /**
     * total number of currencies
     *
     * @var float
     */
    protected $total;
    /**
     * list of currencies
     *
     * @var ListCurrenciesItem[]
     */
    protected $list;
    /**
     * page number
     *
     * @return float
     */
    public function getPage() : float
    {
        return $this->page;
    }
    /**
     * page number
     *
     * @param float $page
     *
     * @return self
     */
    public function setPage(float $page) : self
    {
        $this->page = $page;
        return $this;
    }
    /**
     * total number of currencies
     *
     * @return float
     */
    public function getTotal() : float
    {
        return $this->total;
    }
    /**
     * total number of currencies
     *
     * @param float $total
     *
     * @return self
     */
    public function setTotal(float $total) : self
    {
        $this->total = $total;
        return $this;
    }
    /**
     * list of currencies
     *
     * @return ListCurrenciesItem[]
     */
    public function getList() : array
    {
        return $this->list;
    }
    /**
     * list of currencies
     *
     * @param ListCurrenciesItem[] $list
     *
     * @return self
     */
    public function setList(array $list) : self
    {
        $this->list = $list;
        return $this;
    }
}