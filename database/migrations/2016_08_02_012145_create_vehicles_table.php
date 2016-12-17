<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->integer('status_id');
            $table->string('condition')->nullable();
            $table->integer('body_style_id')->nullable();
            $table->integer('body_style_group_id')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('mrp', 10, 2)->nullable();
            $table->string('stock', 45)->nullable();
            $table->string('trim', 255)->nullable();
            $table->integer('odometer')->nullable();
            $table->string('vin', 20)->nullable();
            $table->integer('doors')->nullable();
            $table->integer('seats')->nullable();
            $table->boolean('featured')->default(false)->nullable();
            $table->dateTime('featured_expires')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('transmission_type_id')->nullable();
            $table->integer('fuel_id')->nullable();
            $table->integer('ext_color_id')->nullable();
            $table->integer('int_color_id')->nullable();
            $table->text('text')->nullable();
            $table->smallInteger('passenger')->nullable();
            $table->string('certification')->nullable();
            $table->integer('drive_type_id')->nullable();
            $table->string('engine_description')->nullable();
            $table->string('engine_cylinders')->nullable();
            $table->string('engine_config')->nullable();
            $table->string('engine_displacement')->nullable();
            $table->string('partner_vehicle_id')->nullable();
            $table->index('user_id');
            $table->index('make_id');
            $table->index('model_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
