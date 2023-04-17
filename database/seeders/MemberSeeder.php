<?php

namespace Database\Seeders;

use App\Models\TeamMemBer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i<=5; $i++){
        $data = new TeamMemBer();
        $data->name = $faker->name;
        $data->slug = $faker->unique()->slug(3);
       
       
        $data->save();
        }
    }
}
