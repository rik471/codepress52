<?php


use CodePress\CodeUser\Models\Permission;
use CodePress\CodeUser\Models\Role;
use Illuminate\Database\Migrations\Migration;

class CreateDataAcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleAdmin = Role::create([
            'name' => Role::ROLE_ADMIN
        ]);

       $roleEditor =  Role::create([
            'name' => Role::ROLE_EDITOR
        ]);

        $roleRedator = Role::create([
            'name' => Role::ROLE_REDATOR
        ]);

        $permissionPublishPost = Permission::create([
            'name' => 'publish_post',
            'description' => 'Permissao para publicar posts em rascunho.'
        ]);

        $permissionAccessCategories = Permission::create([
            'name' => 'access_categories',
            'description' => 'Permission to access the Categories page.'
        ]);

        $permissionAccesUsers = Permission::create([
            'name' => 'access_users',
            'description' => 'Permission to access to view Users page.'
        ]);

        $permissionAccesPosts = Permission::create([
            'name' => 'access_posts',
            'description' => 'Permission to access to access Posts page.'
        ]);

        $roleEditor->permissions()->save($permissionPublishPost);
        //$roleEditor->permissions()->save($permissionAccessCategories);
        $roleEditor->permissions()->save($permissionAccesUsers);
        $roleRedator->permissions()->save($permissionAccesPosts);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
