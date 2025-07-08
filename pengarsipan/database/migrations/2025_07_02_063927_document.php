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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('id_document'); // primary key, AUTO_INCREMENT

            $table->integer('nomor');
            $table->enum('jenis_document', ['PU', 'PG']);
            $table->date('tanggal');
            $table->year('tahun');

            $table->string('nama_document', 255);
            $table->string('direktory_document', 255);

            $table->dateTime('create_at');
            $table->dateTime('update_at');

            $table->unsignedBigInteger('npp');
        });
    }
    public function down(): void
    {
        //
    }
};
