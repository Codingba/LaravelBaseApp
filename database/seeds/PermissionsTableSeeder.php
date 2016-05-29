<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'admin_dashboard',
                'route' => 'admin'
            ], [
                'name' => 'permission_add',
                'route' => 'admin/permission/add'
            ], [
                'name' => 'permission_edit',
                'route' => 'admin/permission/edit/{id}'
            ], [
                'name' => 'permissions_overview',
                'route' => 'admin/permissions'
            ], [
                'name' => 'premission_delete',
                'route' => 'admin/permission/delete/{id}'
            ], [
                'name' => 'role_add',
                'route' => 'admin/role/add'
            ], [
                'name' => 'role_edit',
                'route' => 'admin/role/edit/{id}'
            ], [
                'name' => 'roles_overview',
                'route' => 'admin/roles'
            ], [
                'name' => 'role_delete',
                'route' => 'admin/role/delete/{id}'
            ], [
                'name' => 'user_add',
                'route' => 'admin/user/add'
            ], [
                'name' => 'user_edit',
                'route' => 'admin/user/edit/{id}'
            ], [
                'name' => 'users_overview',
                'route' => 'admin/users'
            ], [
                'name' => 'user_delete',
                'route' => 'admin/user/delete/{id}'
            ]
        ]);

        DB::table('permission_role')->insert([
            [
                'permission_id' => 1,
                'role_id' => 1
            ], [
                'permission_id' => 2,
                'role_id' => 1
            ], [
                'permission_id' => 3,
                'role_id' => 1
            ],[
                'permission_id' => 4,
                'role_id' => 1
            ],[
                'permission_id' => 5,
                'role_id' => 1
            ],[
                'permission_id' => 6,
                'role_id' => 1
            ],[
                'permission_id' => 7,
                'role_id' => 1
            ],[
                'permission_id' => 8,
                'role_id' => 1
            ],[
                'permission_id' => 9,
                'role_id' => 1
            ],[
                'permission_id' => 10,
                'role_id' => 1
            ],[
                'permission_id' => 11,
                'role_id' => 1
            ],[
                'permission_id' => 12,
                'role_id' => 1
            ],[
                'permission_id' => 13,
                'role_id' => 1
            ]

        ]);
    }
}
