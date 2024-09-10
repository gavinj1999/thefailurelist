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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('winning_party');
            $table->string('constituencyName')->nullable(true);
            $table->integer('party_id');
            $table->string('party_slug');
            $table->string('backgroundColour');
            $table->string('foregroundColour');
            $table->string('result');
            $table->integer('electorate');
            $table->integer('turnout');
            $table->integer('majority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elections');
    }
};
