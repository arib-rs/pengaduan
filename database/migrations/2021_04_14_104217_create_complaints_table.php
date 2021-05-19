<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->string('kode');
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('telepon')->nullable();
            $table->bigInteger('pekerjaan')->nullable();
            $table->string('email')->nullable();

            $table->string('subyek');
            $table->longText('uraian');
            $table->bigInteger('pelapor')->nullable();
            $table->string('status');
            $table->string('pict_1')->nullable();
            $table->string('pict_2')->nullable();
            $table->string('pict_3')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->boolean('is_urgent')->nullable();
            $table->boolean('is_valid')->nullable();
            $table->string('alasan')->nullable();
            $table->boolean('is_public')->nullable();
            $table->string('kode_lanjutan')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
