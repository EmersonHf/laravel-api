<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Factories\CustomerFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;

use Tests\TestCase;

class CustomersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/v1/customers');

        $response->assertStatus(200);

    }

    public function test_customer_can_see_index()
    {
        $customer = Customer::create([
            'name' => 'customer 1',
            'type' => 'B',
            'email' => 'customer@email.com',
            'address' => 'rua 1',
            'city' => 'city 2',
            'state' => 'state 3',
            'postal_code' => '55449901'
        ]);

        $response = $this->actingAs($customer)->get('/api/v1/customers');
        $response->assertStatus(200);

    }

    public function test_customer_contains_empty_table()
    {
        $this->assertDatabaseCount('customers', 0);


    }

    public function test_customer_contains_non_empty_table()
    {
        $customer = Customer::create([
            'name' => 'customer 1',
            'type' => 'B',
            'email' => 'customer@email.com',
            'address' => 'rua 1',
            'city' => 'city 2',
            'state' => 'state 3',
            'postal_code' => '55449901'
        ]);

        $response = $this->actingAs($customer)->get('/api/v1/customers');
        $response->assertStatus(200);


    }
}
