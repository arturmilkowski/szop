<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Client without registration.
 */
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'street',
        'zip_code',
        'city',
        'voivodeship_id',
        'email',
        'phone',
    ];

    /**
     * Get customer's order.
     *
     * @return MorphMany
     */
    public function order(): MorphOne
    {
        return $this->morphOne('App\Models\Order', 'orderable');
    }

    /**
     * Get the profile that owns the voivoidship.
     *
     * @return BelongsTo
     */
    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo('App\Models\Voivodeship');
    }

    /**
     * Class name (only for tests).
     *
     * @return string
     */
    /*
     public function orderableName(): string
    {
        return 'App\Models\Customer';
    }
    */
}
