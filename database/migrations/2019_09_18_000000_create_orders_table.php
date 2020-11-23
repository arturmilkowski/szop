<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'orders',
            function (Blueprint $table) {
                $table->increments('id');
                // $table->integer('orderable_id');
                $table->char('orderable_id', 36);
                $table->string('orderable_type');
                $table->unsignedInteger('status_id')->nullable()->default(1);
                $table->unsignedInteger('sale_document_id')->nullable()->default(1);
                // $table->unsignedBigInteger('cost_id')->nullable()->default(1);
                $table->integer('number')->unique();
                $table->decimal('total_price', 6, 2)->default(0);
                $table->decimal('delivery_cost', 6, 2)->default(0);
                $table->decimal('total_price_and_delivery_cost', 6, 2)->default(0);
                $table->string('delivery_name', 60)->nullable()->default(null);
                $table->text('comment')->nullable();
                $table->timestamps();

                $table->index(['total_price', 'created_at']);

                $table->foreign('status_id')
                    ->references('id')->on('statuses')
                    ->onDelete('set null');

                $table->foreign('sale_document_id')
                    ->references('id')->on('sale_documents')
                    ->onDelete('set null');
                /*
                $table->foreign('cost_id')
                    ->references('id')->on('costs')
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
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
