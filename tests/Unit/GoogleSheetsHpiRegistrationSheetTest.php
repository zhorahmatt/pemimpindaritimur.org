<?php

namespace Tests\Unit;

use App\Models\Hpi;
use App\Services\GoogleSheetsHpiRegistrationSheet;
use Carbon\CarbonImmutable;
use Tests\TestCase;

class GoogleSheetsHpiRegistrationSheetTest extends TestCase
{
    public function test_it_maps_a_registration_to_the_expected_sheet_columns(): void
    {
        $hpi = new Hpi([
            'name' => 'Peserta Uji',
            'email' => 'peserta@example.com',
            'whatsapp' => '08123456789',
            'city' => 'Makassar',
            'size' => 'L',
            'business_name' => 'Perusahaan Uji',
            'business_field' => 'Teknologi',
            'position' => 'Manager',
            'problem' => 'Tantangan uji',
            'hope' => 'Harapan uji',
            'from' => 'Website',
            'status' => 'pending',
        ]);
        $hpi->id = 42;
        $hpi->created_at = CarbonImmutable::parse('2026-08-18 10:30:00', 'Asia/Makassar');

        $this->assertSame([
            'hpi:42',
            42,
            '2026-08-18 10:30:00',
            'Peserta Uji',
            'peserta@example.com',
            '08123456789',
            'Makassar',
            'L',
            'Perusahaan Uji',
            'Teknologi',
            'Manager',
            'Tantangan uji',
            'Harapan uji',
            'Website',
            'pending',
        ], GoogleSheetsHpiRegistrationSheet::rowFor($hpi));
    }
}
