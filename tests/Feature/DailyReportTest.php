<?php

namespace Tests\Feature;

use App\DailyReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DailyReportTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowSendDailyReport()
    {

        $response = $this->get('/sendreport');
        $response->assertViewIs('child.send_daily_report');
        $response->assertStatus(200);
    }

    public function testSendDailyReport()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/sendreport', $this->getDailyReport());
        $this->assertCount(1, DailyReport::all());
        $response->assertSessionHas(['status' => "Report Sent"]);
    }

    function getDailyReport(): array
    {
        return [
            'new_case_count' => $this->faker->randomDigit,
            'fatality_count' => $this->faker->randomDigit,
            'summary' => $this->faker->paragraph(),
        ];
    }
}
