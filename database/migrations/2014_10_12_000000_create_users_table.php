<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address', 100);
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->string('token')->nullable();
            $table->string('role');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
