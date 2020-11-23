<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'methods',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('delivery_id');
                $table->string('name', 30);
                $table->string('display_name', 60);
                $table->string('description')->nullable();
                $table->timestamps();

                $table->unique(['delivery_id', 'name']);
                
                $table->foreign('delivery_id')
                    ->references('id')->on('deliveries')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('methods');
    }
}
