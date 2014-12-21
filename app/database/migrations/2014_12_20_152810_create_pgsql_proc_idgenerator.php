<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgsqlProcIdgenerator extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$schema = Config::get('database.connections.pgsql.schema');
		$prefix = Config::get('database.connections.pgsql.prefix');

		$query = <<<SQL

				CREATE SEQUENCE {$schema}.{$prefix}global_id_sequence;
SQL;

		DB::statement($query);


		$query = <<<SQL

				CREATE OR REPLACE FUNCTION {$schema}.{$prefix}id_generator(OUT result bigint) AS $$
				DECLARE
					our_epoch bigint := 1314220021721;
					seq_id bigint;
					now_millis bigint;
					-- the id of this DB shard, must be set for each
					-- schema shard you have - you could pass this as a parameter too
					shard_id int := 1;
				BEGIN
					SELECT nextval('{$schema}.{$prefix}global_id_sequence') % 1024 INTO seq_id;

					SELECT FLOOR(EXTRACT(EPOCH FROM clock_timestamp()) * 1000) INTO now_millis;
					result := (now_millis - our_epoch) << 23;
					result := result | (shard_id << 10);
					result := result | (seq_id);
				END
				$$ LANGUAGE PLPGSQL;
SQL;

		DB::statement($query);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$schema = Config::get('database.connections.pgsql.schema');
		$prefix = Config::get('database.connections.pgsql.prefix');

		$query = <<<SQL

				DROP SEQUENCE {$schema}.{$prefix}global_id_sequence;
SQL;

		DB::statement($query);



		$query = <<<SQL

				DROP FUNCTION {$schema}.{$prefix}id_generator();
SQL;

		DB::statement($query);
	}

}
