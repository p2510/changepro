<?php

namespace App\Models;

use App\Models\Recharge;
use App\Models\Transfer;
use App\Models\Signalman;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'native_country',
        'city',
        'email',
        'password',
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

    /* make relation */

    /**
     * Get all of the transfers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transfers(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }

    /**
     * Get the recharges associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recharges(): HasOne
    {
        return $this->hasOne(Recharge::class);
    }

    /**
     * Get all of the signalmen for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalmen(): HasMany
    {
        return $this->hasMany(Signalman::class);
    }
}
