<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->post('/api/users', [
            'name' => 'hasnat',
            'email' => 'a@aa.com'
        ]);

        $response->assertStatus(201);

        $users = User::all();
        $this->assertCount(1, $users);
    }
}
