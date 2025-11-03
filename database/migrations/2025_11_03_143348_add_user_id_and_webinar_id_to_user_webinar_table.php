<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_webinar', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('webinar_id')->nullable()->after('user_id');

            // (Opsional) Tambah relasi foreign key:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('user_webinar', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'webinar_id']);
        });
    }
};
