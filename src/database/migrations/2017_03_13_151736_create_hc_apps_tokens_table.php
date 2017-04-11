<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcAppsTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_apps_tokens', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('value', 255)->nullable();
			$table->string('app_name', 36)->index('fk_hc_apps_tokens_hc_apps1_namex');
			$table->dateTime('expires_at');
			$table->dateTime('last_used')->nullable();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_apps_tokens');
	}

}
