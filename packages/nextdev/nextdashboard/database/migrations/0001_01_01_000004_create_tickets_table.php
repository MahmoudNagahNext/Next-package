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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            
            $table->foreignId('status_id')
                ->constrained('ticket_statuses')
                ->onDelete('cascade');
            
            $table->foreignId('priority_id')
                ->constrained('ticket_priorities')
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->constrained('ticket_categories')
                ->onDelete('cascade');

            $table->morphs('creatore');
            $table->morphs('assignee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
