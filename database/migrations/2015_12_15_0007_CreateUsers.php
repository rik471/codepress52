<?php



use CodePress\CodeUser\Models\Role;
use CodePress\CodeUser\Models\User;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleAdmin = Role::where('name', Role::ROLE_ADMIN)->first();
        $roleRedator = Role::where('name', Role::ROLE_REDATOR)->first();
        $roleEditor = Role::where('name', Role::ROLE_EDITOR)->first();

        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $redator = User::create([
            'name' => 'Redator',
            'email' => 'redator@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@codepress.com',
            'password' => bcrypt(123456)
        ]);

        $admin->roles()->save($roleAdmin);
        $redator->roles()->save($roleRedator);
        $editor->roles()->save($roleEditor);

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
