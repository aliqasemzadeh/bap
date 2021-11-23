<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TicketFilter extends ModelFilter
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
        return $this->orWhere('title', 'LIKE', '%' . $query . '%');
    }
}
