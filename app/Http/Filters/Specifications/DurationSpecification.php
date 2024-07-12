<?php

namespace App\Http\Filters\Specifications;

use Illuminate\Database\Eloquent\Model;

class DurationSpecification implements SpecificationInterface
{
    function __construct(protected $min, protected $max){}

    public function isSatisfiedBy(Model $model): bool
    {
        if ($model->duration >= $this->min && $model->duration <= $this->max) {
            return true;
        }
        return false;
    }
}
