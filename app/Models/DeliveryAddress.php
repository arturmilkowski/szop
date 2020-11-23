<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryAddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'zip_code', 'city', 'voivodeship_id'
    ];

    /**
     * Get the user profile that owns the address.
     *
     * @return BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo('App\Models\Profile');
    }

    /**
     * Get the user profile that owns the address.
     *
     * @return BelongsTo
     */
    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo('App\Models\Voivodeship');
    }
}
