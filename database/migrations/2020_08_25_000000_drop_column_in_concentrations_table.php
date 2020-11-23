<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnInConcentrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(
            'concentrations',
            function (Blueprint $table) {
                if (Schema::hasColumn('concentrations', 'category_id')) {
                    $table->dropForeign('concentrations_category_id_foreign');
                    $table->dropColumn('category_id');
                }
                // $table->dropForeign('concentrations_category_id_foreign');
                // $table->dropColumn('category_id');
            }
        );
    }
}
