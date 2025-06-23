<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name'      => 'Yayasan Pemimpin dari Timur',
            'tagline'   => '#DariTimurUntukIndonesia',
            'year'      => 2025,
            'members'   => 100,
            'address'   => 'Jl. Abdullah Daeng Sirua No. 460, Batua, Kec. Manggala, Kota Makassar, Sulawesi Selatan 90233',
            'facebook'  => 'GLP Indtim',
            'instagram' => 'GLP Indtim',
            'whatsapp'  => '6281234567890',
            'email'     => 'glp-indtim@gmail.com',
        ]);
    }
}
