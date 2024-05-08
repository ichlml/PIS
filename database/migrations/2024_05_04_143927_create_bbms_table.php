<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai')->nullable(false);
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->unsignedBigInteger('id_kendaraan')->nullable(false);
            $table->date('tanggal');
            $table->string('km_awal', 40);
            $table->string('km_akhir', 40);
            $table->string('total_km', 40);
            $table->string('bbm_liter', 40);
            $table->string('bbm_per_liter', 40);
            $table->string('harga_bbm', 40);
            $table->string('konsumsi_bbm', 40);
            $table->timestamps();

            $table->foreign('id_pegawai')->on('pegawais')->references('id');
            $table->foreign('id_user')->on('users')->references('id');
            $table->foreign('id_kendaraan')->on('kendaraans')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbms');
    }
}
