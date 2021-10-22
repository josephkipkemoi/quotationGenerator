<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyNameRegistration extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_company_name_route_renders()
    {
        $response = $this->get('api/company_name');

        $response->assertStatus(200);
    }

    public function test_user_can_post_company_name()
    {
        $response = $this->post('/api/company_name', [
            'company_name' => 'LOLA INVESTMENTS COMPANY LIMTED',
        ]);

        $response->assertStatus(201);
    }
}
