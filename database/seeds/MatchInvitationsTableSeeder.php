<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MatchInvitationsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		
		DB::table('match_invitations')->delete();

        DB::table('match_invitations')->insert([
        	[
        		'id' => 1,
        		'host_id' => 3,
        		'guest_id' => 4,
        		'status' => 'a',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 2,
        		'host_id' => 3,
        		'guest_id' => 4,
        		'status' => 'r',
				'created_at' => $now,
				'updated_at' => $now,
			],
			[
        		'id' => 3,
        		'host_id' => 3,
        		'guest_id' => 4,
        		'status' => 'p',
				'created_at' => $now,
				'updated_at' => $now,
			],
		]);
	}

}
