<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Relation with customer
            $table->foreignId('customer_id')->nullable()->constrained()->cascadeOnDelete();

            // Better order tracking
            $table->string('order_number')->unique();

            // Customer details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('zip');

            // Payment details
            $table->string('payment_method'); // e.g. COD, Bank Transfer, Stripe
            $table->string('transaction_id')->nullable(); // safer than storing raw card info

            // You can keep these ONLY if required for testing (not recommended for production)
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('cvv')->nullable();
            $table->string('expiry')->nullable();

            $table->decimal('amount', 10, 2);

            // Extra fields
            $table->string('screenshot_path')->nullable();
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded'])
                  ->default('pending');

            $table->text('notes')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();

            $table->timestamps();

            // Indexes for performance
            $table->index('customer_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
