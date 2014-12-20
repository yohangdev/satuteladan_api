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

		$this->call('Oauth2Client');
	}

}

class Oauth2Client extends Seeder {

    public function run()
    {
        DB::table('oauth_clients')->delete();

        DB::table('oauth_clients')->insert([
			'secret'     => 'myapp',
			'name'       => 'myapp description',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
        ]);

    }

}
