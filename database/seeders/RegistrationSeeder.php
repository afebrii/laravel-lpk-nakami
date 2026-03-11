<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $programs = Program::all();

        if ($programs->isEmpty()) {
            return;
        }

        $registrations = [
            [
                'ref_code' => Registration::generateRefCode(),
                'type' => 'pelatihan',
                'program_id' => $programs->random()->id,
                'name' => 'Rizky Febian',
                'phone' => '081122334455',
                'email' => 'rizky@example.com',
                'address' => 'Jl. Peta No. 12, Tasikmalaya',
                'gender' => 'L',
                'dob' => '2000-02-25',
                'last_education' => 'SMA/SMK',
                'occupation' => 'Mahasiswa',
                'mother_phone' => '081223344556',
                'motivation' => 'Ingin belajar tata rambut untuk buka barbershop',
                'status' => 'pending',
                'created_at' => now()->subDays(1),
            ],
            [
                'ref_code' => Registration::generateRefCode(),
                'type' => 'pelatihan',
                'program_id' => $programs->random()->id,
                'name' => 'Mahalini Raharja',
                'phone' => '085566778899',
                'email' => 'mahalini@example.com',
                'address' => 'Perumahan Indah Asri Blok C2, Ciamis',
                'gender' => 'P',
                'dob' => '1998-05-15',
                'last_education' => 'D3/S1',
                'occupation' => 'Karyawan Swasta',
                'mother_phone' => '082112233445',
                'motivation' => 'Ingin beralih profesi menjadi MUA profesional',
                'status' => 'confirmed',
                'admin_notes' => 'Telah membayar DP',
                'confirmed_at' => now()->subHours(5),
                'created_at' => now()->subDays(3),
            ],
            [
                'ref_code' => Registration::generateRefCode(),
                'type' => 'pelatihan',
                'program_id' => $programs->random()->id,
                'name' => 'Tiara Andini',
                'phone' => '087788990011',
                'email' => 'tiara@example.com',
                'address' => 'Jl. HZ Mustofa No. 45, Tasikmalaya',
                'gender' => 'P',
                'dob' => '2002-11-10',
                'last_education' => 'SMA/SMK',
                'occupation' => 'Pelajar',
                'mother_phone' => '081334455667',
                'motivation' => 'Hobi makeup dan ingin memperdalam skill',
                'status' => 'rejected',
                'admin_notes' => 'Tidak dapat dihubungi berulang kali',
                'created_at' => now()->subDays(7),
            ],
            [
                'ref_code' => Registration::generateRefCode(),
                'type' => 'pelatihan',
                'program_id' => $programs->random()->id,
                'name' => 'Lyodra Ginting',
                'phone' => '081999888777',
                'email' => 'lyodra@example.com',
                'address' => 'Jl. RE Martadinata No. 8A, Tasikmalaya',
                'gender' => 'P',
                'dob' => '2001-08-20',
                'last_education' => 'SMA/SMK',
                'occupation' => 'Wirausaha',
                'mother_phone' => '085223344556',
                'motivation' => 'Ingin menambah layanan di salon yang sudah ada',
                'status' => 'pending',
                'created_at' => now()->subMinutes(45),
            ],
        ];

        // Need to simulate time delay to test ref_code generation if static
        // but Since ref_code is generated per array item, it should work fine.
        foreach ($registrations as $i => $data) {
            // Re-generate ref_code to avoid duplicates if time passes
            $data['ref_code'] = Registration::generateRefCode();
            Registration::create($data);
            // sleep 1 second to ensure different created_at order / ref_code if needed
            // not strictly necessary but good practice
        }
    }
}
