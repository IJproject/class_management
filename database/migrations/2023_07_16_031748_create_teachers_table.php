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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('userName')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('owner_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone')->nullable();
            $table->string('instructable')->nullable();
            $table->text('introduction')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
