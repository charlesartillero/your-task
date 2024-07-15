<?php

namespace App\Http\Filters;

use App\Http\Filters\Specifications\BodySpecification;
use App\Http\Filters\Specifications\DurationSpecification;

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
        $bodySpec = new BodySpecification($value);
        return $bodySpec->apply($this->builder);
    }
    public function completed($value)
    {
        return $this->builder->where('completed', '=', $value);
    }

    public function duration($value)
    {
        $durationSpec = new DurationSpecification(50, 60);
        return $durationSpec->apply($this->builder);
    }

}
