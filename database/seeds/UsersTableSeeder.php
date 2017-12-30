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

       $user =  App\User::create([
            'name' => 'Meng',
            'email' => 'menglovegood@gmail.com',
            'password' => bcrypt('Penlymeng123'),
            'admin' => 1,


        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'upload/users/default_picture.png',
            'about' => 'Every person embarks on a journey of self-discovery at some point of time in his or her life.
             Some people attain spiritual enlightenment during this journey of introspection. Knowing oneself fully is the highest point of self-actualization.
              To achieve this goal, you have to accept your flaws and special qualities with humility and honesty.
            If you have a spiritual friend or a guru, you can gain much more from the perspective of an "outsider." Ask your companion to help you introspect on your deeper attributes,
            without being judgmental or defensive.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',


        ]);


    }
}
