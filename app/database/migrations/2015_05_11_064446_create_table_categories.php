<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 100);
                $table->string('slug', 100);
                $table->integer('parent_id')->default(0);
                $table->string('keywords');
                $table->string('description');
                $table->string('lead');
                $table->string('thumbnail');
                $table->tinyInteger('status')->default(1);
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
    }

}
