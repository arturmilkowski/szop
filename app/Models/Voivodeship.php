<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voivodeship extends Model
{
    /**
     * Get the profiles for the voivodeship.
     *
     * @return HasMany
     */
    public function profiles(): HasMany
    {
        return $this->hasMany('App\Models\Profile');
    }
    
    /**
     * Get the proile's delivery address for the voivodeship.
     *
     * @return HasMany
     */
    public function deliveryAddresses(): HasMany
    {
        return $this->hasMany('App\Models\DeliveryAddress');
    }

    /**
     * Get the proile's delivery address for the voivodeship.
     *
     * @return HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany('App\Model\Customer');
    }
}
