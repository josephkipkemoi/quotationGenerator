<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\Cast\Array_;
use Tests\TestCase;

class CompanyNameTest extends TestCase
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

    // public function test_screen_can_render_company_name()
    // {
    //     $response = $this->get('/api/company_name');
    // }

    public function test_stack_array_is_empty(): array
    {
        $stack = [];

        $this->assertEmpty($stack);

        return $stack;
    }

    public function test_push_items_to_stack_array(array $stack = []): array
    {
        array_push($stack,'Magic');

        $this->assertSame('Magic',$stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    public function test_item_is_poped(array $stack = ['Magic']): array
    {
        $this->assertSame('Magic',array_pop($stack));
        $this->assertEmpty($stack);

        return $stack;
    }
}