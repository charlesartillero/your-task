<?php

namespace App\Http\Filters\Specifications;

use App\Http\Filters\Specifications\SpecificationInterface;
use Illuminate\Database\Eloquent\Builder;

class BodySpecification implements SpecificationInterface
{
    function __construct(protected string $body)
    {

    }
    public function apply(Builder $query): Builder
    {
        return $query->where('body', 'like', "%". $this->body. "%");
    }
}
