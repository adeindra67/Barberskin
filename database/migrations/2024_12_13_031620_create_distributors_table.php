<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama');
            $table->string('jenis');
            $table->text('alamat')->nullable();
            $table->string('logosupplier')->nullable(); // Anda bisa mengubah nama field ini menjadi 'logo' 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};