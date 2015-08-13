<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AnswersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('answers')->delete();

		DB::table('answers')->insert([
			[
				'id' => 1,
				'user_id' => 3,
				'question_id' => 1,
				'order' => 1,
				'text' => 'Pepe',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 2,
				'user_id' => 3,
				'question_id' => 1,
				'order' => 2,
				'text' => 'Toto',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 3,
				'user_id' => 3,
				'question_id' => 1,
				'order' => 3,
				'text' => 'Roberto',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 4,
				'user_id' => 3,
				'question_id' => 1,
				'order' => 4,
				'text' => 'Si lo supieras tendría que matarte!',
				'right' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			
			[
				'id' => 5,
				'user_id' => 3,
				'question_id' => 2,
				'order' => 1,
				'text' => 'Perro de tres cabezas',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 6,
				'user_id' => 3,
				'question_id' => 2,
				'order' => 2,
				'text' => 'Tortuga gigante con dientes de leon',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 7,
				'user_id' => 3,
				'question_id' => 2,
				'order' => 3,
				'text' => 'Elefantes siameses',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 8,
				'user_id' => 3,
				'question_id' => 2,
				'order' => 4,
				'text' => 'Unicornio volador con cola de sirena',
				'right' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 9,
				'user_id' => 3,
				'question_id' => 2,
				'order' => 5,
				'text' => 'Auto con inteligencia artificial',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 10,
				'user_id' => 3,
				'question_id' => 3,
				'order' => 1,
				'text' => '1 mes',
				'right' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 11,
				'user_id' => 3,
				'question_id' => 3,
				'order' => 2,
				'text' => '2 meses',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 12,
				'user_id' => 3,
				'question_id' => 3,
				'order' => 3,
				'text' => 'El dia en que la tierra se detenga',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 13,
				'user_id' => 1,
				'question_id' => 4,
				'order' => 1,
				'text' => 'Programador Web',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 14,
				'user_id' => 1,
				'question_id' => 4,
				'order' => 2,
				'text' => 'Bartender',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 15,
				'user_id' => 1,
				'question_id' => 4,
				'order' => 3,
				'text' => 'Alpedologo profesional',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 16,
				'user_id' => 1,
				'question_id' => 4,
				'order' => 4,
				'text' => 'Todas las anteriores',
				'right' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 17,
				'user_id' => 1,
				'question_id' => 5,
				'order' => 1,
				'text' => 'Mmmm... no creo',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 18,
				'user_id' => 1,
				'question_id' => 5,
				'order' => 2,
				'text' => 'Obvio, ni lo dudes!',
				'right' => true,
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
				'id' => 19,
				'user_id' => 1,
				'question_id' => 5,
				'order' => 3,
				'text' => 'Eso esta por verse...',
				'right' => false,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
