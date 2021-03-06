<?php

namespace App\Models;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_id',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    protected $with = [
        'address',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function onduty()
    {
        return $this->hasMany(OnDuty::class);

    }
}
