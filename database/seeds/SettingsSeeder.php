<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
           'site_name' => 'Blogger',
           'contact_email' => 'silajdzic.dev@gmail.com',
           'contact_number' => '123-321-555',
            'address' => 'Bosnia'
        ]);
    }
}
