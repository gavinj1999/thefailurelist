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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->nullable(true);
            $table->string('nameDisplayAs')->nullable(true);
            $table->string('nameListAs')->nullable(true);
            $table->string('slug')->nullable(true);
            $table->integer('party_id')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->integer('constituency_id')->nullable(true);
            $table->string('portrait')->nullable(true);
            $table->string('thumbnail')->nullable(true);
            $table->string('banner')->nullable(true);
            $table->dateTime('membershipStartDate')->nullable(true);
            $table->dateTime('statusStartDate')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
