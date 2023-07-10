<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUlid('order_id'); // ->constrained(); // ->onUpdate('cascade')->onDelete('cascade')
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
