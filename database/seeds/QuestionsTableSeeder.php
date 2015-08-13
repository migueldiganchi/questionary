<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class QuestionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('questions')->delete();

		DB::table('questions')->insert([
			[
				'id' => 1,
				'user_id' => 3,
				'order' => 1,
				'text' => '¿Cual es mi segundo nombre?',
				'answers_number' => 4,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 2,
				'user_id' => 3,
				'order' => 2,
				'text' => '¿Que animal tengo de mascota?',
				'answers_number' => 5,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 3,
				'user_id' => 3,
				'order' => 3,
				'text' => '¿Cuanto vamos a tardar en desarrollar esta app?',
				'answers_number' => 3,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 4,
				'user_id' => 1,
				'order' => 1,
				'text' => '¿A que me dedico?',
				'answers_number' => 4,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 5,
				'user_id' => 1,
				'order' => 2,
				'text' => '¿Posta vamos a terminar de desarrollar esta app?',
				'answers_number' => 3,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
