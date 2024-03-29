<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CPlant extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         Schema::create('code_window', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->integer('parent_id');
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
        Schema::dropIfExists('code_window');
    }
}

