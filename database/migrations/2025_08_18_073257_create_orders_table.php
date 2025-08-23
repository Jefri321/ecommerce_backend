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
        Schema::create('orders', function (Blueprint $table) {
            // Relasi ke pelatihan
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');

            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 15, 2);
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');

            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->text('certificate_address');
            $table->string('company')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();

            $table->uuid('uuid')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
