<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
        ]);
        
        for ($i=1; $i < 21 ; $i++) { 
            DB::table('roles_permissions')->insert([
                'role_id' => 1,
                'permission_id' => $i,
            ]);
        }
        
        DB::table('admins_roles')->insert([
            'role_id' => 1,
            'admin_id' => 1,
        ]);
    }
}
