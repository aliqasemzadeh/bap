<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function replays()
    {
        return $this->hasMany(TicketReplay::class, 'ticket_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(TicketFile::class, 'ticket_id', 'id');
    }
}
