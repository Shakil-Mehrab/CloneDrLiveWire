<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'avatar_id',
        'account_id',
        'avatar_path',
        'settings'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function roles()
    {
        return $this->settings['roles'] ?? ['user'];
    }

    public function hasRole($role)
    {
        if (in_array($role, $this->roles())) {
            return true;
        }
        return false;
    }

    public function isSuper()
    {
        return $this->hasRole('super');
    }

    public function isAdmin()
    {
        if ($this->hasRole('admin')) {
            return true;
        }
        if ($this->hasRole('super')) {
            return true;
        }
        return false;
    }

    public function canImpersonate()
    {
        if ($this->isAdmin()) {
            return true;
        }
        if (!empty($this->account->setting('impersonateEnabled'))) {
            return true;
        }
        return false;
    }
    public function canBeImpersonated()
    {
        if ($this->isAdmin()) {
            return false;
        }
        return true;
    }
}