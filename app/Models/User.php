<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table ='users';

    protected $fillable = ['name', 'surname', 'email'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'id', 'user_id');
    }
}
