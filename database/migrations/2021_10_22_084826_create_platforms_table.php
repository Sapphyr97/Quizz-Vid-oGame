<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('platforms')->insert(
               
            [
                'name'=>'nes'
            ],

        );

        DB::table('platforms')->insert(

            [
                'name'=>'ps4'
            ],

        );

        DB::table('platforms')->insert(

            [
                'name'=>'switch'
            ],

        );

        DB::table('platforms')->insert(

            [
                'name'=>'gameboy'
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
        Schema::dropIfExists('platforms');
    }
}
