<?php

namespace App\Models;

use ALajusticia\Expirable\Traits\Expirable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Expirable;
    use Filterable;

    protected $fillable = [
        'user_id',
        'wallet_id',
        'symbol',
        'network',
        'address',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public static function defaultExpiresAt()
    {
        return Carbon::now()->addMinutes(24*60);
    }
}
