<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->integer('province_id')->unsigned();
            $table->increments('id');
            $table->string('city_name');
        });

        Schema::table('cities', function(Blueprint $table) {
            $table->foreign('province_id')
                        ->references('id')
                        ->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function(Blueprint $table) {
            $table->dropForeign('cities_province_id_foreign');
        }); 
        Schema::drop('cities');
    }
}
