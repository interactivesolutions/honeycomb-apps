<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcAppsAclRolesPermissionsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_apps_acl_roles_permissions_connections', function(Blueprint $table)
		{
			$table->foreign('role_id', 'fk_hc_apps_acl_roles_actions_connections_hc_apps_acl_roles1')->references('id')->on('hc_apps_acl_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('permission_id', 'fk_hc_apps_acl_roles_permissions_connections_hc_apps_acl_perm1')->references('id')->on('hc_apps_acl_permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_apps_acl_roles_permissions_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_apps_acl_roles_actions_connections_hc_apps_acl_roles1');
			$table->dropForeign('fk_hc_apps_acl_roles_permissions_connections_hc_apps_acl_perm1');
		});
	}

}
