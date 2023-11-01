<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//por defecto llama a este por lo cual tenemos que indicarle que una vez llamado , tendra q llamar a estos 
        $this->call(SalarioSeeder::class);  
        $this->call(CategoriasSeeder::class);
    }
}
