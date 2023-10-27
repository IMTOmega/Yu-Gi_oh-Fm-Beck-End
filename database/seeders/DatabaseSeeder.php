<?php

namespace Database\Seeders;

use App\Models\Carta;
use App\Models\Personagem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this-> call([
            CartasSeeder::class,
            PersonagensSeeder::class
        ]);
    }
}
