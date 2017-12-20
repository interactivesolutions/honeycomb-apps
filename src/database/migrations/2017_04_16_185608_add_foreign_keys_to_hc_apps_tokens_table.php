<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcAppsTokensTable
 */
class AddForeignKeysToHcAppsTokensTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_apps_tokens', function (Blueprint $table) {
            $table->foreign('app_id', 'fk_hc_apps_tokens_hc_apps')
                ->references('id')
                ->on('hc_apps')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hc_apps_tokens', function (Blueprint $table) {
            $table->dropForeign('fk_hc_apps_tokens_hc_apps');
        });
    }

}
