<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'replies',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('comment_id')->nullable();
                $table->char('user_id', 36)->nullable();
                $table->text('content');
                $table->string('author');
                $table->boolean('approved')->default(0)
                    ->comment('czy zatwierdzony');
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

                $table->foreign('comment_id')
                    ->references('id')->on('comments')
                    ->onDelete('set null');

                $table->index('approved');
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
        Schema::dropIfExists('replies');
    }
}
