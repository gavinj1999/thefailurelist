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
        Schema::create('election_results', function (Blueprint $table) {
            $table->id();
            $table->integer('constituency_id')->nullable(true);
            $table->string('candidate')->nullable(true);
            $table->string('party_name')->nullable(true);
            $table->integer('votes')->nullable(true);
            $table->integer('rank')->nullable(true);
            $table->string('result_change')->nullable(true);
            $table->float('vote_share', precision:53)->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_results');
    }
};
