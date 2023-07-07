<?php

namespace App\Models;

use ALajusticia\Expirable\Traits\Expirable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifyCode extends Model
{
    use HasFactory;
    use Expirable;

    protected $fillable = [
        'status',
        'user_id',
        'type',
        'method',
    ];

    public static function defaultExpiresAt()
    {
        return Carbon::now()->addMinutes(5);
    }
}
