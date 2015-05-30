<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		if(!Schema::hasTable('settings')){
			Schema::create('settings',function(Blueprint $table){
				$table->increments('id');
				$table->string('code');
				$table->text('value');
				$table->tinyInteger('type')->default(1);
				$table->tinyInteger('status')->default(1);
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
	}

}
