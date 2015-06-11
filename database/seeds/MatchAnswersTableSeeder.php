<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MatchAnswersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('match_answers')->delete();

        DB::table('match_answers')->insert([
        	[
        		'id' => 1,
        		'match_id' => 1,
        		'question_id' => 1,
        		'order' => 1,
				'text' => 'Pepe',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
        	[
        		'id' => 2,
        		'match_id' => 1,
        		'question_id' => 1,
        		'order' => 2,
				'text' => 'Toto',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 3,
        		'match_id' => 1,
        		'question_id' => 1,
        		'order' => 3,
				'text' => 'Roberto',
				'right' => false,
				'selected' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 4,
        		'match_id' => 1,
        		'question_id' => 1,
        		'order' => 4,
				'text' => 'Si lo supieras tendría que matarte!',
				'right' => true,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			[
        		'id' => 5,
        		'match_id' => 1,
        		'question_id' => 2,
        		'order' => 1,
				'text' => 'Perro de tres cabezas',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 6,
        		'match_id' => 1,
        		'question_id' => 2,
        		'order' => 2,
				'text' => 'Tortuga gigante con dientes de leon',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 7,
        		'match_id' => 1,
        		'question_id' => 2,
        		'order' => 3,
				'text' => 'Elefantes siameses',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 8,
        		'match_id' => 1,
        		'question_id' => 2,
        		'order' => 4,
				'text' => 'Unicornio volador con cola de sirena',
				'right' => true,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 9,
        		'match_id' => 1,
        		'question_id' => 2,
        		'order' => 5,
				'text' => 'Auto con inteligencia artificial',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],

			[
        		'id' => 10,
        		'match_id' => 1,
        		'question_id' => 3,
        		'order' => 1,
				'text' => '1 mes',
				'right' => true,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
        	[
        		'id' => 11,
        		'match_id' => 1,
        		'question_id' => 3,
        		'order' => 2,
				'text' => '2 meses',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 12,
        		'match_id' => 1,
        		'question_id' => 3,
        		'order' => 3,
				'text' => 'El dia en que la tierra se detenga',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],

			[
        		'id' => 13,
        		'match_id' => 1,
        		'question_id' => 4,
        		'order' => 1,
				'text' => 'Si',
				'right' => true,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
        	[
        		'id' => 14,
        		'match_id' => 1,
        		'question_id' => 4,
        		'order' => 2,
				'text' => 'No',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 15,
        		'match_id' => 1,
        		'question_id' => 4,
        		'order' => 3,
				'text' => 'No lo se, llegué tarde a la repartición de cerebros!',
				'right' => false,
				'selected' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
