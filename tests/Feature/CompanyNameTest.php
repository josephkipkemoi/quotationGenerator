<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use PhpParser\Node\Expr\Cast\Array_;
use Tests\TestCase;

class CompanyNameTest extends TestCase
{

    // use RefreshDatabase;

    public function test_user_can_post_company_name()
    {
        $response = $this->post('/api/company_name', [
            'relate_company_id' => 1,
            'company_name' => 'LOLA INVESTMENTS COMPANY LIMTED',
        ]);
        $response = $this->post('/api/company_name', [
            'relate_company_id' => 1,
            'company_name' => 'CYNKEM LIMITED COMPANY KENYA',
        ]);

        $response->assertCreated();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_get_most_recent_company_name_registered()
    {
        $response = $this->get('api/company_name?user_id=1');

        $response->assertOk();

        $response->assertJson( fn(AssertableJson $json) =>
            $json->where('id',1)
                ->where('company_name','LOLA INVESTMENTS COMPANY LIMTED')
                ->etc()
        );
    }


    public function test_screen_can_render_company_name_by_id()
    {
        $response = $this->get('/api/company_name/2?user_id=1');

        $response->assertJson(fn(AssertableJson $json) =>
            $json->where('id',2)
            ->where('company_name' , 'CYNKEM LIMITED COMPANY KENYA')
            ->etc()
        );
    }

    public function test_user_relates_to_company()
    {
        $response = $this->get('/api/company_name/1');
        $response->assertOk();
    }
}
