<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'address' => '4E0 F4, Borey Toni, Porsenchey, Phnom Penh, Cambodia',
            'contact_number' => '+855 86 585 891',
            'contact_email' => 'menglovegood@gmail.com',

        ]);
    }
}
