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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_activated')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneNumber')->nullable();
            $table->string('companyName')->nullable();
            $table->string('typeCompany')->nullable();
            $table->string('socialMedia')->nullable();
            $table->string('address')->nullable();
            $table->string('google_id')->nullable();
            $table->string('role')->default("GUEST");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

    }
};
