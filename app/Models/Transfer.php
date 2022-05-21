<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Signalman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable=[
        "option",
        "country_fixed",
        "country_selected",
        "city_selected",
        "amount",
        "currency",
        "phone",
        "status",
        'user_id'     
    ];

    /* make relation */

    /**
     * Get the user that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the signalmen for the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalmen(): HasMany
    {
        return $this->hasMany(Signalman::class);
    }

    /* getter */

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->locale("Fr_fr")->diffForHumans();
    }
}
