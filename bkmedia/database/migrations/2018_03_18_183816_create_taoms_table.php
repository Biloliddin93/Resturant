<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string("taom_nomi");
            $table->string("url");
            $table->integer("narxi");
            $table->integer("type_id");
            $table->integer("size_id");
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
        Schema::dropIfExists('taoms');
    }
}
