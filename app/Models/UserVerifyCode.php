<?php

namespace App\Models;

use ALajusticia\Expirable\Traits\Expirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifyCode extends Model
{
    use HasFactory;
    use Expirable;

    public static function defaultExpiresAt()
    {
        return Carbon::now()->addMinutes(5);
    }
}
