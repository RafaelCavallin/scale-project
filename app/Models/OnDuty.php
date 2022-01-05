<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnDuty extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_finish',
        'user_id',
        'location_id',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    protected $casts = [
        'date_start' => 'datetime:Y-m-d H:i:s',
        'date_finish' => 'datetime:Y-m-d H:i:s',
    ];

    protected $with = [
        'user',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);

    }
}
