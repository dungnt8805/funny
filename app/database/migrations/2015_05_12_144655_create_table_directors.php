<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDirectors extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('directors')) {
            Schema::create('directors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('slug');
                $table->string('lowercase');
                $table->integer('nation_id');
                $table->string('avatar');
                $table->tinyInteger('birth_date')->default(0);
                $table->tinyInteger('birth_month')->default(0);
                $table->integer('birth_year')->default(0);
                $table->tinyInteger('gender');
                $table->text('bio');
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
        if (Schema::hasTable('directors')) {
            Schema::drop('directors');
        }
    }

}
