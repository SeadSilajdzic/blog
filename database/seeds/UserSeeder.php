<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Sead Silajdzic',
            'email' => 'silajdzic.dev@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'link to image',
            'about' => 'Lorem ipsuum dolor sit amet , consectetur adipisicing elit. Accusantium, est veniam non corporis sunt quas voluptates ev.',
            'facebook' => 'facebook.com',
            'linkedin' => 'linkedin.com',
            'youtube' => 'youtube.com',
            'github' => 'github.com',
            'instagram' => 'instagram.com',
        ]);
    }
}
