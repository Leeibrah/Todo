<?php

use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Update the users table
		Schema::table('users', function($table){

			$table->string('image');
			$table->string('business_name');
			$table->string('services');
			$table->string('logo');
			$table->string('phone');
			$table->string('about');
			$table->string('address');
			$table->string('location');
			$table->string('map');
			$table->string('stars');
			$table->string('public');
			$table->string('views');
			$table->string('status');

			$table->timestamps();
			$table->softDeletes();
		
		});

		
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	// public function down()
	// {
	// 	// Update the users table
	// 	Schema::table('users', function($table)
	// 	{
	// 		$table->dropColumn(
	// 			'pic',
	// 			'phone',
	// 			'about',
	// 			'location',
	// 			'map',
	// 			'stars',
	// 			'public',
	// 			'views',
	// 			'status',
	// 			'deleted_at'
	// 		);
	// 	});
	// }

}
