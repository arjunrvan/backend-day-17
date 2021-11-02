<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
            DB::table('users')->insert(['name'=>$faker->name,'email'=>$faker->email,'password'=>$faker->password]);
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->save();
        }
    }
}
