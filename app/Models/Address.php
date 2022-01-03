<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'zipcode',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
