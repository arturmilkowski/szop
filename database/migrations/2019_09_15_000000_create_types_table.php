<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'types',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->unsignedBigInteger('size_id')->nullable()->default(2);
                $table->string('slug', 40)->index();
                $table->string('name', 40)->index();
                $table->decimal('price', 6, 2)->default(0);
                $table->decimal('promo_price', 6, 2)->default(0); // ->nullable();
                $table->unsignedTinyInteger('quantity')->default(0);
                $table->boolean('hide')->default(false);
                $table->text('description')->nullable();
                $table->string('img', 40)->nullable();
                $table->timestamps();

                $table->unique(['product_id', 'slug']);

                $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('set null');

                $table->foreign('size_id')
                    ->references('id')->on('sizes')
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
        Schema::dropIfExists('types');
    }
}
