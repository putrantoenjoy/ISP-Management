<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Tagihan;
use App\Models\Pelanggan;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        // ambil semua pelanggan ID
        $pelangganIds = Pelanggan::pluck('id')->toArray();

        for ($i = 1; $i <= 55; $i++) {

            $status = $faker->randomElement(['belum lunas', 'lunas']);

            Tagihan::create([
                'pelanggan_id' => $faker->randomElement($pelangganIds),
                'periode_tagihan' => now()->subMonths(rand(0, 6))->format('Y-m'),
                'nominal_tagihan' => $faker->randomElement([120000, 180000, 300000, 500000]),
                'status_pembayaran' => $status,

                'tanggal_pembayaran' => $status === 'lunas'
                    ? $faker->dateTimeBetween('-3 months', 'now')
                    : null,
            ]);
        }
    }
}
