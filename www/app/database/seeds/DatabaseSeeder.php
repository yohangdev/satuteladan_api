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

		$this->call('Oauth2Seeder');
	}

}

class Oauth2Seeder extends Seeder {

    public function run()
    {
        DB::table('oauth_clients')->delete();

        DB::table('oauth_clients')->insertGetId([
            'id'         => 'myapp',
			'secret'     => 'myapp',
			'name'       => 'myapp description',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
        ]);


        DB::table('oauth_scopes')->delete();

        DB::table('oauth_scopes')->insert([
            'id'          => 'alumni_data',
            'description' => 'allow access to alumni data',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime
        ]);


        DB::table('oauth_client_scopes')->delete();

        DB::table('oauth_client_scopes')->insert([
            'client_id'  => 'myapp',
            'scope_id'   => 'alumni_data',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);
    }

}
