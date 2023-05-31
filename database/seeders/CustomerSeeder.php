<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name'  => 'Hakan Üşenmez',
            'since' => '2000-01-28'
        ]);

        Customer::create([
            'name'  => 'Kaptan Devopuz',
            'since' => '2000-06-15'
        ]);

        Customer::create([
            'name'  => 'Hikmet Daşcı',
            'since' => '2000-08-11'
        ]);
    }
}
