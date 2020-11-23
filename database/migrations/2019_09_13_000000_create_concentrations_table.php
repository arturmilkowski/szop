<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcentrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'concentrations',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                // $table->unsignedBigInteger('category_id')->nullable();
                $table->string('slug', 40)->unique();
                $table->string('name', 40)->unique();
                $table->timestamps();

                /*
                $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('set null');
                */
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
        Schema::dropIfExists('concentrations');
    }
}
