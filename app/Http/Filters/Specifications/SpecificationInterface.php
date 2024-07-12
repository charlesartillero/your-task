<?php

namespace App\Http\Filters\Specifications;

use Illuminate\Database\Eloquent\Model;

interface SpecificationInterface
{
    public function isSatisfiedBy(Model $model): bool;
}
