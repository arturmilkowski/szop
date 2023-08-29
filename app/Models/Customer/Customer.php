<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphOne};
use App\Models\Order\{Order, Voivodeship};

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'street',
        'zip_code',
        'city',
        'voivodeship_id',
        'email',
        'phone',
    ];

    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }

    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }
}
