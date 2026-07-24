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
        Schema::create('tenants', function (Blueprint $table) {

            $table->id();

            $table->string('nama_tenant');

            $table->string('nama_pic');

            $table->string('no_hp_pic');

            $table->enum('instansi', [
                'Pemerintahan',
                'Swasta',
                'Lainnya'
            ]);

            $table->enum('status_pks', [
                'Belum',
                'Sudah'
            ]);

            $table->string('nomor_kontrak')->nullable();

            $table->date('tanggal_pks')->nullable();

            $table->date('masa_mulai')->nullable();

            $table->date('masa_berakhir')->nullable();

            $table->boolean('arsip')->default(false);

            $table->boolean('deleted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
