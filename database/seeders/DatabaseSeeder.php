<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jenjang;
use App\Models\Tipe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Data awal untuk jenjang
        $jenjangs = [
            ['nama' => 'SMA / Sederajat'],
            ['nama' => 'D1'],
            ['nama' => 'D2'],
            ['nama' => 'D3'],
            ['nama' => 'S1'],
            ['nama' => 'S2'],
            ['nama' => 'S3'],
            ['nama' => 'Non-Degree'],
            ['nama' => 'Gapyear'],
        ];

        foreach ($jenjangs as $jenjang) {
            Jenjang::create($jenjang);
        }

        // Data awal untuk tipe
        $tipes = [
            ['nama' => 'Fully Funded'],
            ['nama' => 'Partially Funded'],
            ['nama' => 'Mentoring'],
            ['nama' => 'Riset'],
            ['nama' => 'Exhcange'],
        ];

        foreach ($tipes as $tipe) {
            Tipe::create($tipe);
        }
    }
}
