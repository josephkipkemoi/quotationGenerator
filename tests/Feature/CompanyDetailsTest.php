<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyDetailsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_post_company_details()
    {
            $response = $this->post('/api/company');

            $response->assertCreated();
    }

    public function test_user_can_get_current_company_details()
    {

    }

    public function test_user_can_get_all_company_details()
    {

    }
}
