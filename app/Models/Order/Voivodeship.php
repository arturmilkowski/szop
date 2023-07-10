<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Customer\Customer;
use App\Models\User\Profile;

class Voivodeship extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    // /**
    //  * Get the proile's delivery address for the voivodeship.
    //  *
    //  * @return HasMany
    //  */
    // public function deliveryAddresses(): HasMany
    // {
    //     return $this->hasMany('App\Models\DeliveryAddress');
    // }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
