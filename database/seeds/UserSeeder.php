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
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/ja.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, est veniam non corporis sunt quas voluptates eveniet perferendis repudiandae, voluptate natus optio eius reiciendis, placeat velit nemo molestiae fugiat fuga.',
            'facebook' => 'https://www.facebook.com',
            'linkedin' => 'https://www.linkedin.com',
            'youtube' => 'https://www.youtube.com',
            'github' => 'https://www.github.com',
            'instagram' => 'https://www.instagram.com',
        ]);
    }
}
