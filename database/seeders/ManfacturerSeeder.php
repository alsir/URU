<?php

namespace Database\Seeders;

use App\Models\Manfacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManfacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manfacturers = ['sg', 'x'];

        foreach ($manfacturers as $manfacturer) {
            $new_manfacturer = new Manfacturer();
            $new_manfacturer->name = $manfacturer;
            $new_manfacturer->save();
        }
    }
}
