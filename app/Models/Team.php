<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends \Laravel\Jetstream\Team
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
