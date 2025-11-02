<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_lomba_user_table.php

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
        Schema::create('lomba_user', function (Blueprint $table) {
            $table->id();

            // Kolom Foreign Key ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Kolom Foreign Key ke tabel lombas
            $table->foreignId('lomba_id')->constrained('lombas')->onDelete('cascade');
            
            // Untuk memastikan user tidak mendaftar lomba yang sama berkali-kali
            $table->unique(['user_id', 'lomba_id']);

            // Jika Anda menggunakan withTimestamps() di Model User, tambahkan ini
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba_user');
    }
};