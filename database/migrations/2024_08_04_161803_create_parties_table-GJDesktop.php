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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->integer('party_id')->nullable(true)->default(0);
            $table->string('name')->nullable(true);
            $table->string('abbreviation')->nullable(true);
            $table->string('backgroundColour')->nullable(true);
            $table->string('foregroundColour')->nullable(true);
            $table->boolean('isLordsMainParty')->nullable(true);
            $table->boolean('isLordsSpiritualParty')->nullable(true);
            $table->integer('governmentType')->nullable(true);
            $table->boolean('isIndependentParty')->nullable(true);
            $table->string('slug')->nullable(true);
            $table->string('logo')->nullable(true)->default('/storage/assets/images/parties/party_no_logo.webp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
