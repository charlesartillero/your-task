<?php

namespace App\Http\Filters;

class TaskFilter extends QueryFilter
{
    public function body($value)
    {
        return $this->builder->where('body', 'like', "%". $value. "%");
    }
    public function completed($value)
    {
        return $this->builder->where('completed', '=', $value);
    }

}
