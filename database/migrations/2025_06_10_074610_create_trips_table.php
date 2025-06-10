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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('region', ['west', 'east', 'north', 'central']);
            $table->date('start_date');
            $table->unsignedInteger('duration_days')->check('duration_days >= 1');
            $table->decimal('price_per_person', 10, 2)->unsigned()->check('price_per_person > 0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
