<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /**
     * Get the users for the role.
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany('App\User');
    }
}
