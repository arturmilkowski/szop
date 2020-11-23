<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'profiles',
            function (Blueprint $table) {
                // $table->bigIncrements('id');
                // $table->unsignedBigInteger('user_id')->nullable();
                $table->uuid('id')->primary();
                $table->char('user_id', 36)->nullable();
                $table->string('lastname', 30);
                $table->string('street', 60);
                $table->string('zip_code', 6);
                $table->string('city', 30);
                $table->unsignedBigInteger('voivodeship_id')->nullable();
                $table->unsignedBigInteger('phone')->nullable();
                $table->timestamps();

                $table->unique('user_id');

                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

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
        Schema::dropIfExists('profiles');
    }
}
