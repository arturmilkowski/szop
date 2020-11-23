<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'posts',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->char('user_id', 36)->nullable();
                $table->string('slug', 60)->unique();
                $table->string('title', 60)->unique();
                $table->string('intro')->nullable()->comment('wstęp');
                $table->text('content')->nullable();
                $table->string('img', 100)->nullable();
                $table->string('site_description')->nullable()
                    ->comment('sekcja head');
                $table->string('site_keyword')->nullable()
                    ->comment('sekcja head');
                $table->boolean('approved')->default(1)->comment('zatwierdzony?');
                $table->boolean('published')->default(1)->comment('opublikowany?');
                $table->boolean('comments_allowed')->default(1)
                    ->comment('komentarze dozwolone?');
                $table->timestamps();

                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');
                /*
                $table->foreign('tag_id')
                    ->references('id')->on('tags')
                    ->onDelete('set null');
                */

                $table->index('approved');
                $table->index('published');
                $table->index('comments_allowed');
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
        Schema::dropIfExists('posts');
    }
}
