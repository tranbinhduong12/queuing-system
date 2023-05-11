<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'full_name',
        'username',
        'phone',
        'email',
        'password',
        'role_id',
        'image',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
