<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i<=20; $i++){
        $data = new Blog();
        $data->title = $faker->title;
        $data->description = $faker->text;
        $data->slug = $faker->unique()->slug(3);
        $data->user_id = User::all()->random()->id;
       
       
        $data->save();
        }
    }
}
