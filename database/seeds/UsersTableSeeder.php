<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('users')->delete();

		DB::table('users')->insert([
			[
				'id' => 1,
				'email' => 'alejandro.barabasz@gmail.com',
				'name' => 'Alejandro Barabasz',
				'password' => md5('alexiscoming'),
				'fb_id' => null,
				'questions_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 2,
				'email' => 'migueldiganchi@gmail.com',
				'name' => 'Miguel Diganchi',
				'password' => md5('mikeiscoming'),
				'fb_id' => null,
				'questions_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
 				'id' => 3,
				'email' => 'host@questionary.com',
				'name' => 'Host',
				'password' => md5('hostiscoming'),
				'fb_id' => null,
				'questions_number' => 3,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
 				'id' => 4,
				'email' => 'guest@questionary.com',
				'name' => 'Guest',
				'password' => md5('guestiscoming'),
				'fb_id' => null,
				'questions_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
 				'id' => 5,
				'email' => 'sandbox@questionary.com',
				'name' => 'Sandbox',
				'password' => md5('sandboxiscoming'),
				'fb_id' => null,
				'questions_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
 				'id' => 6,
				'email' => 'dummy@questionary.com',
				'name' => 'Dummy',
				'password' => md5('dummyiscoming'),
				'fb_id' => null,
				'questions_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
