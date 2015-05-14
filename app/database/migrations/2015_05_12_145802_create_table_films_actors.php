<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilmsActors extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('films_actors')) {
            Schema::create('films_actors', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('film_id');
                $table->integer('actor_id');
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
        if (Schema::hasTable('films_actors')) {
            Schema::drop('films_actors');
        }
    }

}
