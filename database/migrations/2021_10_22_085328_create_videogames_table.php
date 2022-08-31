<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVideogamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('editor');
            $table->date('release_date');
            $table->bigInteger('platform_id')->unsigned()->index();
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('videogames')->insert(
               
            [
                'name'=>'mario',
                'editor' => 'nintendo',
                'release_date' => '1985-05-13',
                'platform_id' => 1
            ],

        );

        DB::table('videogames')->insert(

            [
                'name'=>'god of war',
                'editor' => 'santa monica studio',
                'release_date' => '2018-04-20',
                'platform_id' => 2
            ],

        );

        DB::table('videogames')->insert(

            [
                'name'=>'zelda breath of the wild',
                'editor' => 'nintendo',
                'release_date' => '2017-03-03',
                'platform_id' => 3
            ],

        );

        DB::table('videogames')->insert(

            [
                'name'=>'pokemon version jaune',
                'editor' => 'game freak',
                'release_date' => '1998-09-12',
                'platform_id' => 4
            ],

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videogames');
    }
}
