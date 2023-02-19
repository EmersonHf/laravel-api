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
        $customer = Customer::factory()->create();

        $response = $this->actingAs($customer)->get('/api/v1/customers');

        $response->assertStatus(200);

    }
}
