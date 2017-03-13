<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcAppsAclAppsRolesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_apps_acl_apps_roles_connections', function(Blueprint $table)
		{
			$table->foreign('app_id', 'fk_hc_apps_acl_apps_roles_connections_hc_apps1')->references('id')->on('hc_apps')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_hc_apps_acl_apps_roles_connections_hc_apps_acl_roles1')->references('id')->on('hc_apps_acl_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_apps_acl_apps_roles_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_apps_acl_apps_roles_connections_hc_apps1');
			$table->dropForeign('fk_hc_apps_acl_apps_roles_connections_hc_apps_acl_roles1');
		});
	}

}
