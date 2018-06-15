<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyzationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyzation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mod_id');
            $table->string('scientific_name');
            $table->string('mod_type');
            $table->float('rgr_value');
            $table->float('wp_value');
            $table->float('sn_value');
            $table->string('rgr_description');
            $table->string('wp_description');
            $table->string('sn_description');
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
        Schema::dropIfExists('analyzation');
    }
}
