<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilmsManufacturers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if (!Schema::hasTable('films_manufacturers')) {
			Schema::create('films_manufacturers', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('film_id');
				$table->integer('manufacturer_id');
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
		if (Schema::hasTable('films_manufacturers')) {
			Schema::drop('films_manufacturers');
		}
	}

}
