<?php

declare(strict_types = 1);

namespace Tests\Unit\Concentration;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{Concentration, Category};

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A concentration unit test.
     *
     * @return void
     */
    public function testConcentration(): void
    {
        factory(Concentration::class)->make();
        $concentrations = Concentration::all();

        $this->assertInstanceOf(Collection::class, $concentrations);
        // $this->assertCount(2, $concentrations);
    }

    /**
     * A concentration belongs to category.
     *
     * @return void
     */    
    public function testConcentrationBelongsToCategory(): void
    {
        $concentration = factory(Concentration::class)->make();
        $category = $concentration->category;

        $this->assertInstanceOf(Category::class, $category);
    }
    
    /**
     * A concentration has many products unit test.
     *
     * @return void
     */
    public function testConcentrationHasManyProducts(): void
    {
        $concentration = factory(Concentration::class)->make();
        $products = $concentration->products;

        $this->assertInstanceOf(Collection::class, $products);
    }
}
