<?php

declare(strict_types = 1);

namespace Tests\Unit\Voivodeship;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Voivodeship;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Voivodeship unit test.
     *
     * @return void
     */
    public function testVoivodeship(): void
    {
        $this->withoutExceptionHandling();

        $voivodeship = factory(Voivodeship::class)->create();
        
        $voivodeships = Voivodeship::all();
        
        $this->assertInstanceOf(Collection::class, $voivodeships);
        $this->assertInstanceOf(Voivodeship::class, $voivodeships[0]);
        // $numberOfVoivodeships = 16;
        // $this->assertCount($numberOfVoivodeships, $voivodeships);
    }
}