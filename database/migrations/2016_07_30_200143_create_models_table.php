<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_name')->index();
            $table->integer('make_id')->unsigned();
        });

        Schema::table('models', function(Blueprint $table) {
            $table->foreign('make_id')
                        ->references('id')
                        ->on('makes')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('models', function(Blueprint $table) {
            $table->dropForeign('models_make_id_foreign');
        }); 
        Schema::drop('models');
    }
}
