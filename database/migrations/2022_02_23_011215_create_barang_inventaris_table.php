<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangInventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 100);
            $table->string('merk_barang', 100);
            $table->integer('qty');
            $table->enum('kondisi', ['layak_pakai', 'rusak_ringan', 'rusak_baru']);
            $table->date('tgl_pengadaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangInventaris');
    }
}
