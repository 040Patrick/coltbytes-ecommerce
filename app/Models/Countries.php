<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Countries extends Model
{
    /** @use HasFactory<\Database\Factories\CountriesFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * Relations
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Addresses::class);
    }
}
