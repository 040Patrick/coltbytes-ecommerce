<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addresses extends Model
{
    /** @use HasFactory<\Database\Factories\AddressesFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
        'postal_code',
        'city',
        'state',
        'neighborhood',
        'street',
        'number',
        'complement'
    ];
    /**
     * Relations
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
