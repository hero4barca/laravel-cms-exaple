<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** defines relations with roles Model */

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

    /** verify user's role */
    public function checkRole($role) 
    {
        
        if ( ! $this->hasRole($role)) {
            Auth::logout();
            abort(404);
        }
    }


    public function hasRole($role): bool
    {
        return (bool) $this->role()->where('name', $role)->first();
    }
}
