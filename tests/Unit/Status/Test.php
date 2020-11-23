<?php

declare(strict_types = 1);

namespace Tests\Unit\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Status;

class StatusTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Status has many orders.
     *
     * @return void
     */
    public function testStatusHasManyOrders(): void
    {
        $this->withoutExceptionHandling();
        
        $status = factory(Status::class)->make();
                
        $this->assertInstanceOf(HasMany::class, $status->orders());
    }
}
