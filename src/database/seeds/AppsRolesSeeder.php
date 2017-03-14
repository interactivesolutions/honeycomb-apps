<?php
/**
 * Created by PhpStorm.
 * User: Liutauras Kavaliausk
 * Date: 3/14/2017
 * Time: 10:54 AM
 */

namespace interactivesolutions\honeycombapps\database\seeds;


use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use interactivesolutions\honeycombapps\app\models\apps\Roles;

class AppsRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @throws Exception
     */
    public function run ()
    {
        // http://stackoverflow.com/q/1598411
        $list = [
            ["name" => "Super Admin", "slug" => "super-admin"], // Manage everything
            ["name" => "Project Admin", "slug" => "project-admin"], // Manage most aspects of the site
            ["name" => "Editor", "slug" => "editor"], // Scheduling and managing content
            ["name" => "Author", "slug" => "author"], // Write important content
            ["name" => "Contributor", "slug" => "contributor"], // Authors with limited rights
            ["name" => "Moderator", "slug" => "moderator"], // Moderate user content
            ["name" => "Member", "slug" => "member"], // Special user access
            ["name" => "Subscriber", "slug" => "subscriber"], // Paying Average Joe
            ["name" => "User", "slug" => "user"], // Average Joe
        ];

        DB::beginTransaction ();

        try {
            foreach ($list as $roleData) {
                $role = Roles::where ('slug', $roleData['slug'])->first ();

                if (!$role)
                    Roles::create ($roleData);
            }
        } catch (\Exception $e) {
            DB::rollback ();

            throw new Exception($e->getMessage ());
        }

        DB::commit ();
    }
}