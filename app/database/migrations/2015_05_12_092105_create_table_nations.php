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
                $table->string('vi_name');
                $table->string('code');
                $table->tinyInteger('hidden')->default(1);
                $table->tinyInteger('has_film')->default(0);
                $table->tinyInteger('position')->default(0);
                $table->index('name', 'code', 'vi_name');
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
