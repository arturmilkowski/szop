<?php

declare(strict_types=1);

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\{Product, Concentration, Category};
use App\Models\Product\Size;

class SizeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Size test.
     *
     * @return void
     */
    public function testSize(): void
    {
        $size = factory(Size::class)->make();
        $this->assertInstanceOf(Size::class, $size);
    }

    /**
     * A size has many product types.
     *
     * @return void
     */
    public function testSizeHasManyTypes(): void
    {
        $size = factory(Size::class)->make();
        $products = $size->products;
        $this->assertInstanceOf(Collection::class, $products);
        /*
        $users = $role->users;
        $this->assertInstanceOf(Collection::class, $users);
        
        $user = $users[0];
        $this->assertInstanceOf(User::class, $user);
        */
    }
}
