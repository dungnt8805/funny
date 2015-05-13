<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEpisodes extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('episodes')) {
            Schema::create('episodes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('film_id');
                $table->string('title');
                $table->string('url');
                $table->tinyInteger('server');
                $table->tinyInteger('error');
                $table->string('subtitle');
                $table->string('trailer');
                $table->tinyInteger('position');
                $table->timestamps();
                $table->softDeletes();
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
        if (Schema::hasTable('episodes')) {
            Schema::drop('episodes');
        }
    }

}
