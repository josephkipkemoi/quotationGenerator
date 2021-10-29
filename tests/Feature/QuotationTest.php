<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class QuotationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_post_quotation_address()
    {
        $response = $this->post('/api/quotation_address', [
            'quotation_id' => 1,
            'quotation_to' => 'CAPITAL HILL RESTARAUNT',
            'quotation_date' => '22/03/2021',
            'quotation_number' => 'DFDADSD'
        ]);

        $response = $this->post('/api/quotation_address', [
            'quotation_id' => 1,
            'quotation_to' => 'MONZA HOTEL HOTEL',
            'quotation_date' => '22/03/2021',
            'quotation_number' => 'DFDADSE'
        ]);

        $response = $this->post('/api/quotation_address', [
            'quotation_id' => 2,
            'quotation_to' => 'SAFARI PARK HOTEL',
            'quotation_date' => '22/03/2021',
            'quotation_number' => 'DFDADSE'
        ]);

        $response->assertCreated();

    }

    public function test_user_can_get_all_address_associated_with_account()
    {
        $response = $this->get('/api/quotation_address?user_id=1');

        $response->assertOk();

        $response->assertJsonCount(2);
    }

    public function test_user_can_get_most_recent_quotation_address()
    {
        $response = $this->get('/api/quotation_address?user_id=1&current=true');

        $response->assertOk();

        $response->assertJsonCount(1);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('quotation_id', '=', 1)
                ->where('quotation_to','SAFARI PARK HOTEL')
                ->etc()
        );
    }

    public function test_user_can_post_product_to_quotation_table()
    {

    }

    public function test_user_can_get_all_products_on_quotation_table()
    {

    }

    public function test_user_can_get_sum_of_product_on_quotation_table()
    {

    }

    public function test_user_can_get_sum_of_everything_on_quotation_table()
    {

    }

    public function test_user_can_remove_product_on_quotation_table()
    {

    }

    public function test_db_indexing_is_not_reorganized_after_product_is_removed()
    {

    }

}
