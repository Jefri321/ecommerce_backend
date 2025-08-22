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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Nama lengkap sesuai KTP
            $table->string('email')->unique(); // Email aktif
            $table->string('password');
            $table->string('phone', 20)->nullable(); // Nomor telepon / WhatsApp
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable(); // Jenis kelamin
            $table->text('address')->nullable();
            $table->text('certificate_address')->nullable(); // Alamat pengiriman sertifikat
            $table->string('profile_photo')->nullable();
            $table->string('company')->nullable(); // Nama perusahaan (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
