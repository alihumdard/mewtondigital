<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InquiriesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('inquiries')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'message' => $faker->text(400),
                'status' => 'Active',
                'created_by' => null, 
                'updated_by' => null, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
