<?php

namespace Database\Seeders;

use App\Models\Hospitals;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospitals::create([
            'name' => 'Hospital A',
            'address' => '123 Hospital St.',
            'email' => 'hospital@a.com',
            'phone' => '1234567890',
        ]);

        Hospitals::create([
            'name' => 'Hospital B',
            'address' => '456 Hospital Ave.',
            'email' => 'hospital@b.com',
            'phone' => '0987654321',
        ]);
    }
}
