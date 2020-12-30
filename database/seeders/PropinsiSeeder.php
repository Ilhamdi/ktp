<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propinsis')->insert([
            'namaPropinsi' => 'Sumatera Utara',
        ]);
    }
}
