<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MatchesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('matches')->delete();

        DB::table('matches')->insert([
        	[
        		'id' => 1,
        		'host_id' => 3,
        		'guest_id' => 4,
        		'questions_number' => 4,
        		'answers_number' => 1,
        		'rights_number' => 0,
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
