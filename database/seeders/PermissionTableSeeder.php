<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Post Create',
            'slug' => 'post-create',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post Edit',
            'slug' => 'post-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post List',
            'slug' => 'post-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post Delete',
            'slug' => 'post-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post Show',
            'slug' => 'post-show',
        ]);


        DB::table('permissions')->insert([
            'name' => 'Intern Create',
            'slug' => 'intern-create',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Intern Edit',
            'slug' => 'intern-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Intern List',
            'slug' => 'intern-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Intern Delete',
            'slug' => 'intern-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Intern Show',
            'slug' => 'intern-show',
        ]);

        DB::table('permissions')->insert([
            'name' => 'suicide Create',
            'slug' => 'suicide-create',
        ]);
        DB::table('permissions')->insert([
            'name' => 'suicide Edit',
            'slug' => 'suicide-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'suicide List',
            'slug' => 'suicide-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'suicide Delete',
            'slug' => 'suicide-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'suicide Show',
            'slug' => 'suicide-show',
        ]);


        DB::table('permissions')->insert([
            'name' => 'Permission',
            'slug' => 'permission-create',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Permission',
            'slug' => 'permission-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Permission',
            'slug' => 'permission-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Permission',
            'slug' => 'permission-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Permission Show',
            'slug' => 'permission-show',
        ]);


        DB::table('permissions')->insert([
            'name' => 'Role Create',
            'slug' => 'role-create',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Role Edit',
            'slug' => 'role-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Role List',
            'slug' => 'role-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Role Delete',
            'slug' => 'role-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Role Show',
            'slug' => 'role-show',
        ]);


        DB::table('permissions')->insert([
            'name' => 'User Create',
            'slug' => 'user-create',
        ]);

        DB::table('permissions')->insert([
            'name' => 'User Edit',
            'slug' => 'user-edit',
        ]);
        DB::table('permissions')->insert([
            'name' => 'User List',
            'slug' => 'user-list',
        ]);
        DB::table('permissions')->insert([
            'name' => 'User Delete',
            'slug' => 'user-delete',
        ]);
        DB::table('permissions')->insert([
            'name' => 'User Show',
            'slug' => 'user-show',
        ]);

    }
}
