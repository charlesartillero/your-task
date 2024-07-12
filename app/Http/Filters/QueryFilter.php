<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected Builder $builder;
    protected Request $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder) {
        $this->builder = $builder;

        foreach ($this->request->query() as $key => $value) {
            if (method_exists($this, $key)) {
                return $this->$key($value);
            }
        }



    }
}
