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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_section_id')->constrained()->onDelete('cascade');
            $table->string('question_text');
            $table->text('help_text')->nullable();
            $table->enum('question_type', [
                'text',
                'textarea',
                'radio',
                'checkbox',
                'select',
                'yes_no'
            ])->default('text');
            $table->json('options')->nullable();
            $table->boolean('is_required')->default(false);
            $table->integer('order')->default(0);
            $table->string('validation_rules')->nullable();
            $table->timestamps();

            $table->index(['questionnaire_section_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
