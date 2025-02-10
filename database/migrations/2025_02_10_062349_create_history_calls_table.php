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
        Schema::create('history_calls', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pemanggilan');
            $table->string('nama_pic')->nullable(); // Null jika tidak diperlukan
            $table->string('nama_mesin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_calls');
    }
};
