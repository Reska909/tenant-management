<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('contracts', function (Blueprint $table) {

        $table->id();

        $table->foreignId('tenant_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('nomor_kontrak');

        $table->string('judul_kontrak');

        $table->date('tanggal_kontrak');

        $table->date('mulai');

        $table->date('selesai');

        $table->decimal('nilai_kontrak',15,2)->nullable();

        $table->string('file_kontrak')->nullable();

        $table->string('status')->default('Aktif');

        $table->text('keterangan')->nullable();

        $table->boolean('deleted')->default(false);

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};