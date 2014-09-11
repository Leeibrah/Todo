<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		// $this->call('UserTableSeeder');

		$this->call('ProfilesTableSeeder');		
		$this->call('MessagesTableSeeder');
		
		$this->call('UsersTableSeeder');
		$this->call('ContractorsTableSeeder');
		$this->call('GalleriesTableSeeder');
		$this->call('EndorsementsTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('LeadsTableSeeder');
		$this->call('Service_requestsTableSeeder');
		$this->call('CountiesTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('CreditialsTableSeeder');
		$this->call('CredentialsTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('JanisesTableSeeder');
		$this->call('TodosTableSeeder');
	}
	public static function seed($table)
	{
		Eloquent::unguard();
		$_this = new self;

		$_this->call(ucwords($table).'TableSeeder');
	}

}