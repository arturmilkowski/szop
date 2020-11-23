<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'comments',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('post_id');
                $table->char('user_id', 36)->nullable();
                $table->ipAddress('ip')->nullable();
                $table->string('agent')->nullable();
                $table->text('content');
                $table->string('author');
                $table->boolean('approved')->default(0)->comment('zatwierdzony?');
                $table->timestamps();

                $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');

                $table->foreign('user_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('comments');
    }
}
