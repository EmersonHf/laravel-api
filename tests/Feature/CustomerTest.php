<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Database\Factories\CustomerFactory;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;





class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testUnauthorizedCustomerCreationWithBasicToken()
    {
        $customerData = CustomerFactory::class(Customer::create());
        $user = User::class(Auth::user());
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->createToken('basic-token')->plainTextToken,
            'Accept' => 'application/json',
        ])->post('/api/v1/customers', $customerData);

        $response->assertStatus(401);
        $this->assertDatabaseMissing('customers', $customerData);
    }
}
