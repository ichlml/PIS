<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{

    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kendaraan', 100);
            $table->string('nopol', 10);
            $table->string('warna', 10);
            $table->string('merk', 40);
            $table->string('kelas', 2);
            $table->string('jenis', 40);
            $table->string('jenis_bbm', 40);
            $table->string('transmisi', 20);
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
