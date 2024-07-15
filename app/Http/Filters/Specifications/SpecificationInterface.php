<?php

namespace App\Http\Filters\Specifications;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;


interface SpecificationInterface
{
    public function apply(Builder $query): Builder;
}
