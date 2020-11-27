<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setUsernameAttribute($value)
    {
        $username = \Illuminate\Support\Str::snake(strtolower($this->attributes['name']));

        for ($i = 1; 1 == User::withTrashed()->whereUsername($username)->exists(); $i++) {
            $username = \Illuminate\Support\Str::snake(strtolower($this->attributes['name'])) . "_{$i}";
        }

        $this->attributes['username'] = $username;
    }
}
