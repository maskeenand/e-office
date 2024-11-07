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
        Schema::create('pedomans', function (Blueprint $table) {
            $table->id();
            $table->char('no_sk_pedoman',255);
            $table->date('tgl_pedoman');
            $table->char('judul_pedoman',255);
            $table->char('file',255);
            $table->char('keterangan',255);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedomans');
    }
};
