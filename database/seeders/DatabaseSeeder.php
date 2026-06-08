<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('role', 'admin')->exists()) {
            $this->call(AdministratorSeeder::class);
        }
        $this->call(UserSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(TagihanSeeder::class);
    }
}
