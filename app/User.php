<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne, MorphMany};
use App\Traits\UUID;

class User extends Authenticatable
{
    use Notifiable;
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /*
    public static function boot(): void
    {
        parent::boot();

        self::creating(
            function ($model) {
                $model->id = (string) Str::uuid();  // (string) Uuid::generate();
            }
        );
    }
    */
    /**
     * Get the role that owns the user.
     *
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get the profile associated with the user.
     * 
     * @return HasOne 
     */
    public function profile(): HasOne
    {
        return $this->hasOne('App\Models\Profile');
    }

    /**
     * Get all of the user's orders.
     *
     * @return MorphMany
     */
    public function orders(): MorphMany
    {
        return $this->morphMany('App\Models\Order', 'orderable');
    }

    /**
     * If the user has super admin role.
     *
     * @return boolean
     */
    public function isSuperAdmin(): bool
    {
        return $this->role->name == 'superadmin';
    }

    /**
     * If the user has admin role.
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->role->name == 'admin';
    }

    /**
     * Class name (only for tests).
     *
     * @return string
     */
    /*
     public function orderableName(): string
    {
        return 'App\User';
    }
    */
}
