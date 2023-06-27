<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Enams\UserRoles;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        

        User::insert([
            [
            'name' => 'Artem',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'role'=>UserRoles::Admin->value
        ],
        [
            'name' => 'Artem user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12341234'),
            'role'=>UserRoles::User->value
        ]]);

        User::factory(10)->create();
        Category::factory(8)->create();
        Post::factory(40)->create();
        Tag::factory(12)->create();

        for($i = 0; $i < 100; $i++) {
            try {
                DB::table('post_tag')->insert([
                    'post_id' => rand(1, 40),
                    'tag_id' => rand(1, 12)
                ]);
            } catch (\Exception $e) {
                continue;
            }
        }

        for($i = 0; $i < 100; $i++) {
            try {
                DB::table('author_reader')->insert([
                    'author_id' => rand(1, 10),
                    'reader_id' => rand(1, 10)
                ]);
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
