<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            [
                'id' => uniqid(),
                'name' => 'Aceh',
                'slug' => Str::slug('Aceh'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sumatera Utara',
                'slug' => Str::slug('Sumatera Utara'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sumatera Barat',
                'slug' => Str::slug('Sumatera Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Riau',
                'slug' => Str::slug('Riau'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kepulauan Riau',
                'slug' => Str::slug('Kepulauan Riau'),
                'status' => 1,
            ],
            // Tambahkan data provinsi lainnya sesuai kebutuhan
            [
                'id' => uniqid(),
                'name' => 'Jambi',
                'slug' => Str::slug('Jambi'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sumatera Selatan',
                'slug' => Str::slug('Sumatera Selatan'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Bengkulu',
                'slug' => Str::slug('Bengkulu'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Lampung',
                'slug' => Str::slug('Lampung'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kepulauan Bangka Belitung',
                'slug' => Str::slug('Kepulauan Bangka Belitung'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'DKI Jakarta',
                'slug' => Str::slug('DKI Jakarta'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Jawa Barat',
                'slug' => Str::slug('Jawa Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Jawa Tengah',
                'slug' => Str::slug('Jawa Tengah'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Jawa Timur',
                'slug' => Str::slug('Jawa Timur'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'DI Yogyakarta',
                'slug' => Str::slug('DI Yogyakarta'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Banten',
                'slug' => Str::slug('Banten'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Bali',
                'slug' => Str::slug('Bali'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Nusa Tenggara Barat',
                'slug' => Str::slug('Nusa Tenggara Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Nusa Tenggara Timur',
                'slug' => Str::slug('Nusa Tenggara Timur'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kalimantan Barat',
                'slug' => Str::slug('Kalimantan Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kalimantan Tengah',
                'slug' => Str::slug('Kalimantan Tengah'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kalimantan Selatan',
                'slug' => Str::slug('Kalimantan Selatan'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kalimantan Timur',
                'slug' => Str::slug('Kalimantan Timur'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Kalimantan Utara',
                'slug' => Str::slug('Kalimantan Utara'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sulawesi Utara',
                'slug' => Str::slug('Sulawesi Utara'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sulawesi Tengah',
                'slug' => Str::slug('Sulawesi Tengah'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sulawesi Selatan',
                'slug' => Str::slug('Sulawesi Selatan'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sulawesi Tenggara',
                'slug' => Str::slug('Sulawesi Tenggara'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Gorontalo',
                'slug' => Str::slug('Gorontalo'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Sulawesi Barat',
                'slug' => Str::slug('Sulawesi Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Maluku',
                'slug' => Str::slug('Maluku'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Maluku Utara',
                'slug' => Str::slug('Maluku Utara'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Papua Barat',
                'slug' => Str::slug('Papua Barat'),
                'status' => 1,
            ],
            [
                'id' => uniqid(),
                'name' => 'Papua',
                'slug' => Str::slug('Papua'),
                'status' => 1,
            ],
        ];

        foreach ($provinces as $provinceData) {
            Province::create($provinceData);
        }
    }
}
