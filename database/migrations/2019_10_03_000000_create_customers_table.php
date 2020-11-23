<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'customers',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 30);
                $table->string('lastname', 30);
                $table->string('street', 60);
                $table->string('zip_code', 6);
                $table->string('city', 30);
                $table->unsignedBigInteger('voivodeship_id')->nullable();
                $table->string('email', 60);
                $table->unsignedBigInteger('phone')->nullable();
                $table->timestamps();

                $table->foreign('voivodeship_id')
                    ->references('id')->on('voivodeships')
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
        Schema::dropIfExists('customers');
    }
}
