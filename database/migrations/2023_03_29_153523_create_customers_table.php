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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voivodeship_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name', 30);
            $table->string('lastname', 30);
            $table->string('street', 60);
            $table->string('zip_code', 6);
            $table->string('city', 30);
            $table->string('email', 60);
            $table->unsignedBigInteger('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
