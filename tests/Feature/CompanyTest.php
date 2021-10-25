<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_post_company_details()
    {
        $response = $this->post('api/company', [
            'company_id' => 1,
            'company_logo_url' => 'some https url',
            'company_slogan' => 'Together on the move',
            'company_address' => 'P.O.Box 123 - Nairobi',
            'company_web_url' => 'www.somecompany.co.ke',
            'company_email' => 'mycompany@company.co.ke'
        ]);

        $response = $this->post('api/company', [
            'company_id' => 1,
            'company_logo_url' => 'some other url',
            'company_slogan' => 'Together on the move',
            'company_address' => 'P.O.Box 123 - Nairobi',
            'company_web_url' => 'www.somecompany.co.ke',
            'company_email' => 'mycompany@company.co.ke'
        ]);

        $response->assertCreated();

    }

    public function test_user_can_get_most_recent_company_details_registered()
    {
            $response = $this->get('api/company?company_details=1');

            $response->assertOk();

            $response->assertJson(fn(AssertableJson $json) => 
                    $json->where('id',1)
                    ->where('company_slogan', 'Together on the move')
                    ->etc()
            );
    }

    public function test_user_can_get_all_company_details_registered()
    {
        $response = $this->get('api/company/1');

        $response->assertOk();

        $response->assertJsonCount(2);
    }


    public function test_user_can_not_get_company_details_if_not_registered()
    {
        $response = $this->get('api/company/2');

        $response->assertJsonCount(0);
    }
}
