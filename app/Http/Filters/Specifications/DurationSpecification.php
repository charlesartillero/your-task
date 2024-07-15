<?php

namespace App\Http\Filters\Specifications;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;


class DurationSpecification implements SpecificationInterface
{
    function __construct(protected $min, protected $max){}

    public function apply(Builder $query):  Builder
    {
        return $query->whereBetween('duration', [$this->min, $this->max]);
    }
}
