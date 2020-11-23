<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

trait UUID
{
    /**
     * Bootstrap trait.
     *
     * @return void
     */
    protected static function bootUUID(): void
    {
        static::creating(
            function ($model) {
                if (!$model->getKey()) {
                    $model->{$model->getKeyName()} = (string) Str::uuid();
                }
            }
        );
    }

    /**
     * Get incrementing.
     *
     * @return boolean
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get key type.
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
