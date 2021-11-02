<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('jobs')->insert(['title'=>$faker->jobTitle,'description'=>$faker->text,'min_salary'=>$faker->randomNumber(6),'mas_salary'=>$faker->randomNumber(6)]);
            $job = new Job();
            $job->title = $faker->jobTitle;
            $job->description = $faker->text;
            $job->min_salary = $faker->randomNumber(6);
            $job->mas_salary = $faker->randomNumber(6);
            $job->save();
        }
    }
}
