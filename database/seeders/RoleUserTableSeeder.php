<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Faker\Generator as Faker;


class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //prendo tutti i post e tutti i technlogy id -> il pluck prende solo gli id della categoria
        $roles = Role::all()->pluck('id');
        $users = User::all();

        //dico a projects di prendere la relazione con technology e di attaccarci due random technology id tramite faker
        foreach ($users as $user) {
            $user->roles()->attach($faker->randomElements($roles, 2));
        }
    }
}
