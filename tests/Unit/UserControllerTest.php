<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('users.index');
        $response->assertViewHas('users', $users);
    }

    public function test_create_method()
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('users.create');
    }

    public function test_store_method()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->post(route('users.store'), $userData);

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', $userData);
    }

    public function test_show_method()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user));

        $response->assertStatus(200);
        $response->assertViewIs('users.show');
        $response->assertViewHas('user', $user);
    }

    public function test_edit_method()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', $user));

        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user', $user);
    }

    public function test_update_method()
    {
        $user = User::factory()->create();
        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->patch(route('users.update', $user), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', $updatedData);
    }

    public function test_destroy_method()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
