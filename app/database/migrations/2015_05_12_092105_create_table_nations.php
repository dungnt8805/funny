<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNations extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('nations')) {
            Schema::create('nations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->tinyInteger('position');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if (Schema::hasTable('nations')) {
            Schema::drop('nations');
        }
    }

}
