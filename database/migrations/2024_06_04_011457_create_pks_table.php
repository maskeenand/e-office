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
        Schema::create('pks_kerjasmas', function (Blueprint $table) {
            $table->id();
            $table->char('no_pks_ekternal',50);
            $table->char('no_pks_internal',50);
            $table->date('tgl_mulai_kerjasama');
            $table->date('tgl_akhir_kerjasama');
            $table->char('jangkawaktu',250);
            $table->char('vendor',250);
            $table->char('perjanjian',250);
            $table->string('keterangan',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pks');
    }
};
