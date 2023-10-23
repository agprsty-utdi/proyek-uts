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
        Schema::create('register_siswas', function (Blueprint $table) {
            $table->integer("no_pendaftaran")->primary();
            $table->string("nama");
            $table->string("alamat");
            $table->date("tanggal_lahir");
            $table->char("jenis_kelamin");
            $table->string("asal_sekolah");
            $table->char('agama');
            $table->double('nilai_ind')->default(0.0);
            $table->double('nilai_ipa')->default(0.0);
            $table->double('nilai_mtk')->default(0.0);
            $table->double('total_nilai')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_siswas');
    }
};
