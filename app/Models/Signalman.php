<?php

namespace App\Models;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Signalman extends Model
{
    use HasFactory;
    protected $fillable=["status","user_id","transfer_id"];

    /*relation */

    /**
     * Get the user that owns the Signalmen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    /**
     * Get the transfers that owns the Signalmen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transfers(): BelongsTo
    {
        return $this->belongsTo(Transfer::class);
    }

}
