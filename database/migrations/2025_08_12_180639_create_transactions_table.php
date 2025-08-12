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
        Schema::create('transactions', function (Blueprint $table) {

            $table->foreignId('checkout_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique(); // ID unik ke Midtrans
            $table->string('transaction_id')->nullable(); // ID transaksi Midtrans
            $table->string('payment_type')->nullable();
            $table->string('transaction_status')->default('pending');
            $table->string('fraud_status')->nullable();

            $table->decimal('gross_amount', 12, 2);
            $table->string('currency', 3)->default('IDR');

            $table->timestamp('transaction_time')->nullable();
            $table->timestamp('settlement_time')->nullable();
            $table->timestamp('expiry_time')->nullable();

            $table->json('payload')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
