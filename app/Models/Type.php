<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function createTypeSlug()
    {
        return Str::slug($this->name, '-');
    }
}
