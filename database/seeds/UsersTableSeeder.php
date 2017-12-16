<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\User::create([
            'name' => 'Meng',
            'email' => 'menglovegood@gmail.com',
            'password' => bcrypt('NEneJang123'),

        ]);
    }
}
