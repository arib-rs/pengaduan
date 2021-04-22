<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUnitsTableNullableField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->longText('alamat')->nullable()->change();
            $table->string('telepon')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('tingkat')->nullable()->change();
            $table->boolean('is_active')->default(true)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
