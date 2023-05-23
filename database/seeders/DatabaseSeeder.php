<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Dhaiful Imam',
            'username' => 'dhaifulimam',
            'email' => 'mdhaifulimam@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        User::factory(3)->create();

        // User::create([
        //     'name' => 'Imam',
        //     'email' => 'imam@gmail.com',
        //     'password' => bcrypt('qwerty')
        // ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
    }
}
