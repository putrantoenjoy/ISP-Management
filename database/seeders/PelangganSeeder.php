<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $paketList = [25, 50, 100, 200];

        $hargaList = [
            25 => 120000,
            50 => 180000,
            100 => 300000,
            200 => 500000,
        ];

        for ($i = 1; $i <= 55; $i++) {

            $paket = $faker->randomElement($paketList);

            Pelanggan::create([
                'nama_pelanggan' => $faker->name(),
                'nomor_telepon' => '08' . $faker->numberBetween(1000000000, 9999999999),
                'alamat' => $faker->address(),
                'paket_internet' => $paket . ' Mbps',
                'harga_paket' => $hargaList[$paket],
                'status_pelanggan' => $faker->randomElement(['aktif', 'suspend', 'putus']),
            ]);
        }
    }
}
