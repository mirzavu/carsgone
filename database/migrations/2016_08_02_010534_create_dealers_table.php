<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 30);
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('address', 100);
            $table->integer('partner_id');
            $table->string('partner_dealer_id');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->string('phone', 20);
            $table->string('fax', 20);
            $table->string('url');
            $table->string('postal_code',10);
            $table->double('latitude', 10, 6);
            $table->double('longitude', 10, 6);
            $table->boolean('featured')->default(false);
            $table->dateTime('featured_expires');
            $table->integer('status_id');
            $table->string('image');
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
        Schema::drop('dealers');
    }
}
