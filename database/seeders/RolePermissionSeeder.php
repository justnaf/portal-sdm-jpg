<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tes_dewa = User::create([
            'name' => 'Tes Dewa',
            'username' => 'tesdewa',
            'email' => 'tesdewa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ]);

        $tes_admin = User::create([
            'name' => 'Tes Admin',
            'username' => 'tesadmin',
            'email' => 'tesadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ]);

        $tes_ranger = User::create([
            'name' => 'Tes Ranger',
            'username' => 'tesranger',
            'email' => 'tesranger@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ]);

        $role_dewa = Role::create(['name' => 'Dewa']);
        $role_admin = Role::create(['name' => 'Admin']);
        $role_ranger = Role::create(['name' => 'Ranger']);

        /**
         * Only Dewa PERMISSION
         */

        Permission::create(['name' => 'only dewa']);

        /**
         *  For Admin PERMISSION
         */
        $tes_dewa->assignRole($role_dewa);
        $tes_admin->assignRole($role_admin);
        $tes_ranger->assignRole($role_ranger);

        $permission_add_user = Permission::create(['name' => 'can add user']);
        $permission_edit_user = Permission::create(['name' => 'can edit user']);
        $permission_update_user = Permission::create(['name' => 'can update user']);
        $permission_delete_user = Permission::create(['name' => 'can delete user']);

        $role_admin->givePermissionTo($permission_add_user);
        $role_admin->givePermissionTo($permission_edit_user);
        $role_admin->givePermissionTo($permission_update_user);
        $role_admin->givePermissionTo($permission_delete_user);
        
        /**
         * For ALL User PERMISSION
         */
        $permission_edit_profile = Permission::create(['name' => 'can edit profile']);
        $permission_update_profile = Permission::create(['name' => 'can update profile']);
        
        $role_ranger->givePermissionTo($permission_edit_profile);
        $role_ranger->givePermissionTo($permission_update_profile);
        $role_admin->givePermissionTo($permission_edit_profile);
        $role_admin->givePermissionTo($permission_update_profile);



    }
}
