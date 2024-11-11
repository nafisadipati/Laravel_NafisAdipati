<?php

namespace Database\Seeders;

use App\Models\Patients;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patients::create([
            'name' => 'Patient 1',
            'address' => '123 Patient St.',
            'phone' => '1112223333',
            'hospital_id' => 1,
        ]);
        Patients::create([
            'name' => 'Patient 2',
            'address' => '456 Patient Ave.',
            'phone' => '4445556666',
            'hospital_id' => 2,
        ]);
    }
}
