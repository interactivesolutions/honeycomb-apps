<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcAppsAclRolesPermissionsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_apps_acl_roles_permissions_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('role_id', 36)->index('fk_hc_apps_acl_roles_actions_connections_hc_apps_acl_roles1_idx');
			$table->string('permission_id', 36)->index('fk_hc_apps_acl_roles_permissions_connections_hc_apps_acl_pe_idx');
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
		Schema::drop('hc_apps_acl_roles_permissions_connections');
	}

}
