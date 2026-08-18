<?php

namespace Tests\Feature;

use App\Jobs\SyncHpiRegistrationToGoogleSheet;
use App\Models\Hpi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HpiRegistrationCapacityTest extends TestCase
{
    use RefreshDatabase;

    public function test_hpi_page_exposes_a_capacity_of_48_seats(): void
    {
        Hpi::query()->insert($this->registrations(30));

        $this->get('/hpi')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->component('User/Others/Hpi/Index')
                ->where('registration_limit', 48)
                ->where('current_registrations', 30)
                ->where('remaining_slots', 18)
                ->where('is_registration_open', true));
    }

    public function test_hpi_registration_accepts_the_48th_participant_and_rejects_the_49th(): void
    {
        Queue::fake();
        Hpi::query()->insert($this->registrations(47));

        $this->post('/hpi', $this->registrationPayload(48))
            ->assertRedirect('/hpi')
            ->assertSessionHasNoErrors();

        $this->assertDatabaseCount('hpis', 48);

        $this->from('/hpi')->post('/hpi', $this->registrationPayload(49))
            ->assertRedirect('/hpi')
            ->assertSessionHasErrors([
                'limit' => 'Mohon maaf, kuota pendaftaran sudah penuh (48 peserta). Silakan hubungi admin untuk informasi lebih lanjut.',
            ]);

        $this->assertDatabaseCount('hpis', 48);
    }

    public function test_successful_registration_queues_google_sheet_sync_once(): void
    {
        Queue::fake();

        $this->post('/hpi', $this->registrationPayload(1))
            ->assertRedirect('/hpi')
            ->assertSessionHasNoErrors();

        Queue::assertPushed(
            SyncHpiRegistrationToGoogleSheet::class,
            fn (SyncHpiRegistrationToGoogleSheet $job) => $job->hpiId === Hpi::query()->sole()->id,
        );

        $this->from('/hpi')->post('/hpi', $this->registrationPayload(1))
            ->assertRedirect('/hpi')
            ->assertSessionHasErrors('email');

        Queue::assertPushed(SyncHpiRegistrationToGoogleSheet::class, 1);
    }

    private function registrations(int $count): array
    {
        return collect(range(1, $count))
            ->map(fn (int $number) => array_merge(
                $this->registrationPayload($number),
                [
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ))
            ->all();
    }

    private function registrationPayload(int $number): array
    {
        return [
            'name' => "Peserta {$number}",
            'email' => "peserta{$number}@example.com",
            'whatsapp' => "081234567{$number}",
            'city' => 'Makassar',
            'size' => 'L',
            'business_name' => 'Perusahaan Uji',
            'business_field' => 'Teknologi',
            'position' => 'Manager',
            'problem' => 'Tantangan uji',
            'hope' => 'Harapan uji',
            'from' => 'Website',
        ];
    }
}
