<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
            $table->text('details');
            $table->integer('price');
            $table->integer('sales_type_id');
            $table->integer('city_id');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->integer('number_of_beds');
            $table->integer('number_of_baths');
            $table->boolean('pet_allowed');
            $table->boolean('dishwasher');
            $table->boolean('furnished');
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
		Schema::drop('properties');
	}

}
