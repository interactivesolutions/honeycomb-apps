<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcAppsAclAppsRolesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_apps_acl_apps_roles_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('app_id', 36)->index('fk_hc_apps_acl_apps_roles_connections_hc_apps1_idx');
			$table->string('role_id', 36)->index('fk_hc_apps_acl_apps_roles_connections_hc_apps_acl_roles1_idx');
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
		Schema::drop('hc_apps_acl_apps_roles_connections');
	}

}
