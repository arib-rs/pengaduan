<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('complaint_id');
            $table->longText('uraian');
            $table->string('jenis');
            $table->bigInteger('responden');
            $table->dateTime('read_at')->nullable();
            $table->string('pict_1');
            $table->string('pict_2');
            $table->string('pict_3');
            $table->string('long');
            $table->string('lat');
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
        Schema::dropIfExists('responses');
    }
}
