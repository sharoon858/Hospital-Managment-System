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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('age');
            $table->string('phone_number')->unique();
            $table->string('height');
            $table->string('gender');
            $table->string('weight');
            $table->string('cnic')->unique();
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
