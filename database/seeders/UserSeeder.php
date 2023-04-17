<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i<=200; $i++){
        $data = new User();
        $data->name = $faker->name;
        $data->slug = $faker->unique()->slug(3);
        $data->email = $faker->email;
        $data->password = Hash::make($faker->word);
       
      
        $data->status = $faker->boolean;
        $data->save();
        }
    }
}
