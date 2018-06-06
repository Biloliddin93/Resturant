<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZakazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakazs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("taom_id");
            $table->integer("user_id");
            $table->float("qancha");
            $table->tinyInteger("zakaz_stats_id");
            $table->integer("zakaz_stol_id");
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
        Schema::dropIfExists('zakazs');
    }
}
