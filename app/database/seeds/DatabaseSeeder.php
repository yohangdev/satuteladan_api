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

        $this->call('TableUsersSeeder');
		$this->call('TableOauth2Seeder');
	}

}

class TableUsersSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
        [
            'email'      => 'alumni1@satuteladan.net',
            'password'   => Hash::make('alumni1'),
            'active'     => true,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],[
            'email'      => 'alumni2@satuteladan.net',
            'password'   => Hash::make('alumni2'),
            'active'     => true,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],[
            'email'      => 'alumni3@satuteladan.net',
            'password'   => Hash::make('alumni3'),
            'active'     => true,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]
        ]);
    }

}

class TableOauth2Seeder extends Seeder {

    public function run()
    {

        DB::table('oauth_grants')->delete();

        DB::table('oauth_grants')->insert([
        [
            'id'         => 'client_credentials',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],
        [
            'id'         => 'password',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],
        [
            'id'         => 'refresh_token',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]
        ]);




        DB::table('oauth_clients')->delete();

        DB::table('oauth_clients')->insertGetId([
            'id'         => 'myapp',
			'secret'     => 'myapp',
			'name'       => 'myapp description',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
        ]);





        DB::table('oauth_client_grants')->delete();

        DB::table('oauth_client_grants')->insert([
        [
            'client_id'  => 'myapp',
            'grant_id'   => 'client_credentials',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],
        [
            'client_id'  => 'myapp',
            'grant_id'   => 'password',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],
        [
            'client_id'  => 'myapp',
            'grant_id'   => 'refresh_token',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]
        ]);




        DB::table('oauth_scopes')->delete();

        DB::table('oauth_scopes')->insert([
            'id'          => 'access_alumni',
            'description' => 'Allow access to alumni data',
            'created_at'  => new DateTime,
            'updated_at'  => new DateTime
        ]);



        DB::table('oauth_client_scopes')->delete();

        DB::table('oauth_client_scopes')->insert([
            'client_id'  => 'myapp',
            'scope_id'   => 'access_alumni',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);


        DB::table('oauth_grant_scopes')->delete();

        DB::table('oauth_grant_scopes')->insert([
            'grant_id'   => 'password',
            'scope_id'   => 'access_alumni',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

    }
}


