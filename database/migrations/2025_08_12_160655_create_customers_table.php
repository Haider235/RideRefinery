<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string('first_name');
    $table->string('last_name')->nullable();
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->text('address')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('zip_code')->nullable();
    $table->string('slug')->nullable();
    $table->boolean('status')->default(1); // 1 = active, 0 = inactive

    // 🔐 Auth-related fields
    $table->string('password');
    $table->rememberToken();
    $table->timestamp('email_verified_at')->nullable();

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
