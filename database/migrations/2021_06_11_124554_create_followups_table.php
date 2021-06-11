<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_id');
            $table->string('user_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('kegiatan');
            $table->bigInteger('biaya')->nullable();
            $table->string('sumber')->nullable();
            $table->string('detail_sumber')->nullable();
            $table->string('dasar');
            $table->date('tgl_dokumen');
            $table->string('no_dokumen');
            $table->string('rekanan')->nullable();
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
        Schema::dropIfExists('followups');
    }
}
