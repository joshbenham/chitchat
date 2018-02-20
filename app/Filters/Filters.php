<?php

namespace App\Filters;

abstract class Filters
{
    protected $builder;
    protected $filters = [];

    /**
     * @param Builder $builder
     * @return void
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array_filter(request()->only($this->filters));
    }
}
