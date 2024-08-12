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
        Schema::create('oppositions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hansardName');
            $table->integer('opposition_id');
            $table->integer('member_id');
            $table->integer('sort_order');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oppositions');
    }
};
