<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected Builder $builder;
    protected Request $request;

    protected $sortable = [];

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(array $arr) {
        foreach ($arr as $key => $value) {
            if (method_exists($this, $key)) {
                return $this->$key($value);
            }
        }
        return $this->builder;
    }

    public function sort($column)
    {
        $direction = 'asc';

        if (str_starts_with($column, '-')) {
            $direction = 'desc';
            $column = str_replace('-', '', $column);
        }

        if (!in_array($column, $this->sortable)) {
            return $this->builder;
        }

        $column = $this->sortable[$column] ?? $column;

        return $this->builder->orderBy($column, $direction);
    }

    public function apply($builder) {
        $this->builder = $builder;
        foreach ($this->request->query() as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $this->builder;

    }
}
