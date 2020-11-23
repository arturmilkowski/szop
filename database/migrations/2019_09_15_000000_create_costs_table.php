<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'costs',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('method_id');
                $table->unsignedTinyInteger('piece');
                $table->unsignedBigInteger('size_id');
                $table->decimal('cost', 4, 2);
                $table->string('description')->nullable();
                $table->timestamps();

                $table->unique(['method_id', 'piece', 'size_id']);

                $table->foreign('method_id')
                    ->references('id')->on('methods')
                    ->onDelete('cascade');

                $table->foreign('size_id')
                    ->references('id')->on('sizes')
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
        Schema::dropIfExists('costs');
    }
}
