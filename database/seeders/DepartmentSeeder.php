<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder

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
            DB::table('departments')->insert(['name'=>$faker->name]);
            $department = new Department();
            $department->name = $faker->name;
            $department->save();
        }
    }
}
