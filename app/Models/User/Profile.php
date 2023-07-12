<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};
use App\Models\User;
use App\Models\Order\Voivodeship;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'surname', 'street', 'zip_code', 'city', 'voivodeship_id', 'phone'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }

    public function deliveryAddress(): HasOne
    {
        return $this->hasOne(DeliveryAddress::class);
    }
}
