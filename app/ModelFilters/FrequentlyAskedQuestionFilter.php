<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class FrequentlyAskedQuestionFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($query)
    {
        return $this->orWhere('question', 'LIKE', '%' . $query . '%')
            ->orWhere('answer', 'LIKE', '%' . $query . '%');
    }
}
