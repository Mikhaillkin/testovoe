<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter
{
    protected Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function apply(array $filters): Builder
    {
        foreach ($filters as $method => $value) {
            if (method_exists($this, $method) && !empty($value)) {
                $this->$method($value);
            }
        }
        return $this->query;
    }
}
