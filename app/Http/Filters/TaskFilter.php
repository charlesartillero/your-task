<?php

namespace App\Http\Filters;

class TaskFilter extends QueryFilter
{
    protected $sortable = [
        'id',
        'body',
        'completed',
        'updatedAt' => 'updated_at',
        'createdAt' => 'created_at',
    ];
    public function body($value)
    {
        return $this->builder->where('body', 'like', "%". $value. "%");
    }
    public function completed($value)
    {
        return $this->builder->where('completed', '=', $value);
    }

    public function duration($value)
    {
        return $this->builder->where('duration', '=', $value);
    }

}
