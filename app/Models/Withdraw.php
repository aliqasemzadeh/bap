<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;

class Withdraw extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => __('bap.no_user'),
        ]);;
    }
}
