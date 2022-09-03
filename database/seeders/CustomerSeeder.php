<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'nama' => 'Dina ariyanti',
            'alamat' => 'Semarang',
            'telp' => '089624234',
        ]);
        Customer::create([
            'nama' => 'Amalia aristiya',
            'alamat' => 'Pekalongan',
            'telp' => '089624234',
        ]);
        Customer::create([
            'nama' => 'Ari Mahamedi',
            'alamat' => 'Jember',
            'telp' => '089624234',
        ]);
        Customer::create([
            'nama' => 'Dea Ningrum',
            'alamat' => 'Kediri',
            'telp' => '089624234',
        ]);
    }
}
