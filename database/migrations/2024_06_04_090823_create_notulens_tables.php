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
        Schema::create('notulens_tables', function (Blueprint $table) {
            $table->id();
            $table->date('hari_tanggal');
            $table->time('jam');
            $table->char('tempat',255);
            $table->char('pimpinan_rapat',255);
            $table->char('file',255);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notulens_tables');
    }
};
