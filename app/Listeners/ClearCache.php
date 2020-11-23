<?php

declare(strict_types=1);

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use App\Events\EditProduct;

class ClearCache
{
    // public function __construct() {}

    /**
     * Handle the event.
     *
     * @param EditProduct $event EditProduct
     * 
     * @return void
     */
    public function handle(): void
    {
        Cache::flush();
    }
}
