<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //definisco i ruoli
        $roles = [
            [
                'role_level' => '1',
                'name' => 'Admin'
            ],
            [
                'role_level' => '2',
                'name' => 'Moderator'
            ],
            [
                'role_level' => '3',
                'name' => 'Editor'
            ],
            [
                'role_level' => '4',
                'name' => 'User'
            ],
            ];

        foreach ($roles as $role) {
            $newRole = new Role();
            $newRole->name = $role['name'];
            $newRole->role_level = $role['role_level'];
            $newRole->save();
        }
    }
}