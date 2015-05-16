<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilmsDirectors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if(!Schema::hasTable('films_directors')){
			Schema::create('films_directors',function(Blueprint $table){
				$table->increments('id');
				$table->integer('film_id');
				$table->integer('directory_id');
				$table->timestamps();
				$table->index('film_id','directory_id');
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
		if(Schema::hasTable('films_directors')){
			Schema::drop('films_directors');
		}
	}

}
