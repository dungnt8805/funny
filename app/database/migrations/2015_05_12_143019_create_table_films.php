<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilms extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('films')) {
            Schema::create('films', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('slug');
                $table->string('eng_title');
                $table->integer('parent_id')->default(0);
                $table->tinyInteger('nation_id');
                $table->string('thumbnail');
                $table->string('keywords');
                $table->string('quality', 10)->default('HD');
                $table->text('description');
                $table->text('short_description');
                $table->text('images');
                $table->integer('durations');
                $table->tinyInteger('in_cinema')->default(0);
                $table->string('year');
                $table->tinyInteger('hot')->default(0);
                $table->tinyInteger('multi')->default(0);
                $table->integer('views')->default(0);
                $table->tinyInteger('awards');
                $table->string('imdb_score', 4);
                $table->string('imdb');
                $table->string('rate');
                $table->tinyInteger('status')->default(1);
                $table->integer('view_day')->default(0);
                $table->integer('view_week')->default(0);
                $table->integer('view_month')->default(0);
                $table->string('trailer')->default(null);
                $table->tinyInteger('is_error')->default(0);
                $table->timestamps();
                $table->softDeletes();
                $table->index('id', 'title', 'eng_title', 'director_id', 'nation_id');
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
        if (Schema::hasTable('films')) {
            Schema::drop('films');
        }
    }

}
