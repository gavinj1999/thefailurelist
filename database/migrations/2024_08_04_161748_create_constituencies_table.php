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
        Schema::create('constituencies', function (Blueprint $table) {
            $table->id();
            $table->integer('constituency_id')->nullable(true)->default(0);
            $table->string('constituencyName')->nullable(true)->default(null);
            $table->integer('currentRepresentationId')->nullable(true)->default(0);
            $table->string('slug')->nullable(true)->default(null);
            $table->datetime('startDate')->nullable(true)->default(null);
            $table->datetime('endDate')->nullable(true)->default(null);
            $table->longText('geometry')->nullable(true)->default(null);
            $table->integer('currentMp')->nullable(true)->default(0);
            $table->integer('latestParty')->nullable(true)->default(0);
            $table->string('backgroundColour')->nullable(true)->default(0);
            $table->string('foregroundColour')->nullable(true)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constituencies');
    }
};
