<?php

namespace DevmeSdk\Model;

class ListCountriesOut
{
    /**
     * page number
     *
     * @var float
     */
    protected $page;
    /**
     * total number of countries
     *
     * @var float
     */
    protected $total;
    /**
     * list of countries
     *
     * @var ListCountriesItem[]
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
     * total number of countries
     *
     * @return float
     */
    public function getTotal() : float
    {
        return $this->total;
    }
    /**
     * total number of countries
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
     * list of countries
     *
     * @return ListCountriesItem[]
     */
    public function getList() : array
    {
        return $this->list;
    }
    /**
     * list of countries
     *
     * @param ListCountriesItem[] $list
     *
     * @return self
     */
    public function setList(array $list) : self
    {
        $this->list = $list;
        return $this;
    }
}
