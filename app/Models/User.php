<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'name',

        'email',

        'password',

        'role',

        'status',

    ];

    /**
     * Hidden Attributes
     */
    protected $hidden = [

        'password',

        'remember_token',

    ];

    /**
     * Attribute Casting
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

        ];
    }

        /**
     * Cek apakah user adalah Administrator
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}