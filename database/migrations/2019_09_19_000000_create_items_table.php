<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'items',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('order_id')->nullable();
                $table->integer('type_id')->nullable();
                $table->string('type_name', 40);
                $table->unsignedTinyInteger('type_size_id');
                $table->string('name', 40)->index();
                $table->string('concentration', 40);  // ->index();
                $table->string('category', 40);  // ->unique();
                $table->decimal('price', 6, 2);  // ->default(0);
                $table->unsignedTinyInteger('quantity');  // ->default(0);
                $table->decimal('subtotal_price', 6, 2);
                $table->timestamps();

                // $table->unique(['order_id', 'type_id']);

                $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
