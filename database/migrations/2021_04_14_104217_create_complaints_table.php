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
            
            $table->string('name');
            $table->string('gender');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('telepon');
            $table->bigInteger('pekerjaan');
            $table->string('email')->unique();

            $table->string('subyek');
            $table->longText('uraian');
            $table->bigInteger('pelapor');
            $table->dateTime('lapor_at');
            $table->dateTime('catat_at');
            $table->string('status');
            $table->string('pict_1');
            $table->string('pict_2');
            $table->string('pict_3');
            $table->string('long');
            $table->string('lat');
            $table->boolean('is_valid')->default(null);
            $table->string('alasan')->default(null);
            $table->dateTime('validated_at')->default(null);
            $table->boolean('is_public')->default(null);
            $table->bigInteger('complaint_id')->nullable();
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
