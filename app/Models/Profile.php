<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Support\Str;
use App\Traits\UUID;

/**
 * User profile
 */
class Profile extends Model
{
    use UUID;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    // public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    // protected $keyType = 'string';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /* public static function boot(): void
    {
        parent::boot();

        self::creating(
            function ($model) {
                $model->id = (string) Str::uuid();
            }
        );
    }
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'street', 'zip_code', 'city', 'voivodeship_id', 'phone'
    ];

    /**
     * Get the user that owns the profile.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
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
     * Get the delivery address associated with the profile.
     *
     * @return HasOne
     */
    public function deliveryAddress(): HasOne
    {
        return $this->hasOne('App\Models\DeliveryAddress');
    }
}
