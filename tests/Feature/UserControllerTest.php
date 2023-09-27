<?php

namespace Tests\Feature;

use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    //Perform a post() request to add a new user

    public function test_if_it_stores_new_users()
    {
        // Create a user for authentication
        $user = User::factory()->create();
        // Authenticate the user for the test
        $this->actingAs($user);
        // Disable real queue connections for testing
        Queue::fake();
        $response = $this->post(route('user-save'), [
            'user_id' => null,
            'name' => 'Charissa Lamb',
            'surname' => 'Wright',
            'id_number' => '132',
            'email' => $user->email,
            'dob' => '1999-09-27',
            'phone_no' => '1234',
            'language' => 'Urdu',
            'interests' => [
                0 => '24',
                1 => '21',
                2 => '17',
                3 => '12',
                4 => '10',
                5 => '9',
                6 => '7',
            ],
        ]);

        // Assert that the SendWelcomeEmail job was dispatched
        Queue::assertPushed(SendWelcomeEmail::class);
        $response->assertStatus(200);
    }

    public function test_if_it_update_a_user()
    {
        // Create a user for authentication
        $user = User::factory()->create();
        // Authenticate the user for the test
        $this->actingAs($user);
        $response = $this->post(route('user-save'), [
            'user_id' => 8,
            'name' => 'Charissa Lamb',
            'surname' => 'Wright',
            'id_number' => '132',
            'email' => 'sas@gmail.com',
            'dob' => '1999-09-27',
            'phone_no' => '1234',
            'language' => 'Urdu',
            'interests' => [
                0 => '24',
                1 => '21',
                2 => '17',
                3 => '12',
                4 => '10',
                5 => '9',
                6 => '7',
            ],
        ]);

        $response->assertStatus(200);
    }


    //for delete

    public function test_if_it_deletes_a_user()
    {
        // Create a user for testing
        $user = User::factory()->create();
        // Authenticate the user for the test
        $this->actingAs($user);
        // Send a DELETE request to the URL with the user's ID
        $response = $this->get("/user/delete/{$user->id}");
        // Assert that the response indicates a successful deletion (e.g., a redirect or a JSON response)
        $response->assertStatus(200);

    }




}
