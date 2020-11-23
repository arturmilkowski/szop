<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'products',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('category_id')->nullable();
                $table->unsignedBigInteger('concentration_id')->nullable();
                $table->string('slug', 60)->unique();
                $table->string('name', 60)->unique();
                $table->text('description')->nullable();
                $table->string('img', 60)->nullable();
                $table->string('site_description')->nullable()
                    ->comment('sekcja head');
                $table->string('site_keyword')->nullable()
                    ->comment('sekcja head');
                $table->timestamps();

                $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('set null');

                $table->foreign('concentration_id')
                    ->references('id')->on('concentrations')
                    ->onDelete('set null');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
