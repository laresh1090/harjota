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
        // Add score to individual answers (only column still missing)
        if (!Schema::hasColumn('answers', 'score')) {
            Schema::table('answers', function (Blueprint $table) {
                $table->integer('score')->nullable()->after('answer_value');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('score');
        });
    }
};
