<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MatchQuestionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('match_questions')->delete();

        DB::table('match_questions')->insert([
        	[
        		'id' => 1,
        		'match_id' => 1,
        		'order' => 1,
				'text' => '¿Cual es mi segundo nombre?',
				'answers_number' => 4,
				'answered' => true,
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
        	[
        		'id' => 2,
        		'match_id' => 1,
        		'order' => 2,
				'text' => '¿Que animal tengo de mascota?',
				'answers_number' => 5,
				'answered' => false,
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 3,
        		'match_id' => 1,
        		'order' => 3,
				'text' => '¿Cuanto vamos a tardar en desarrollar esta app?',
				'answers_number' => 3,
				'answered' => false,
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 4,
        		'match_id' => 1,
        		'order' => 4,
				'text' => '¿Será esta la última pregunta?',
				'answers_number' => 3,
				'answered' => false,
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
