<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Size, Brand};

class SizeTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeSize(): void
    {
        $size = Size::factory()->make();

        $this->assertInstanceOf(Size::class, $size);
    }

    public function testCreateSize(): void
    {
        $size = Size::factory()->create();

        $this->assertDatabaseHas(
            'sizes',
            [
                'name' => $size->name,
                'display_name' => $size->display_name,
            ]
        );
    }

    public function testSizeHasManyTypes(): void
    {
        $size = Size::factory()->make();
        $types = $size->types;

        $this->assertInstanceOf(Collection::class, $types);
    }
}
