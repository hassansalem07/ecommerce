<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'super_admin','guard_name'=>'admin']);
        $admin = Role::create(['name' => 'admin','guard_name'=>'admin']);
        $editor = Role::create(['name' => 'editor','guard_name'=>'admin']);
        
        $list = Permission::create(['name' => 'list','guard_name'=>'admin']);
        $create = Permission::create(['name' => 'create','guard_name'=>'admin']);
        $edit = Permission::create(['name' => 'edit','guard_name'=>'admin']);
        $delete = Permission::create(['name' => 'delete','guard_name'=>'admin']);
        $manageAdmins = Permission::create(['name' => 'manageAdmins','guard_name'=>'admin']);


        $super_admin->syncPermissions([$list,$create,$edit,$delete,$manageAdmins]);
        $admin->syncPermissions([$list,$create,$edit,$delete]);
        $editor->syncPermissions([$list,$create,$edit]);
        
    }
}