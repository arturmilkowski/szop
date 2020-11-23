<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'delivery_addresses',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                // $table->unsignedBigInteger('profile_id')->unique();
                $table->char('profile_id', 36)->unique();
                $table->unsignedBigInteger('voivodeship_id')->nullable();
                $table->string('street', 60);
                $table->string('zip_code', 6);
                $table->string('city', 30);
                $table->timestamps();

                $table->foreign('profile_id')
                    ->references('id')->on('profiles')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('delivery_addresses');
    }
}
