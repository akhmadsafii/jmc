<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
use Faker\Factory as Faker;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $provinces = Province::all();

        foreach ($provinces as $province) {
            for ($i = 1; $i <= 4; $i++) {
                $districtName = $faker->city;

                District::create([
                    'id' => Str::uuid(),
                    'name' => $districtName,
                    'slug' => Str::slug($districtName),
                    'population' => rand(10000, 50000),
                    'province_id' => $province->id,
                    'status' => 1,
                ]);
            }
        }
    }
}
