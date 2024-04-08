<?php

namespace Tests\Unit;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method()
    {
        $clients = Client::factory()->count(3)->create();

        $response = $this->get(route('clients.index'));

        $response->assertStatus(200);
        $response->assertViewIs('clients.index');
        $response->assertViewHas('clients', $clients);
    }

    public function test_create_method()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('clients.create'));

        $response->assertStatus(200);
        $response->assertViewIs('clients.create');
        $response->assertViewHas('users', $users);
    }

    public function test_store_method()
    {
        $clientData = [
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->post(route('clients.store'), $clientData);

        $response->assertStatus(302);
        $response->assertRedirect(route('clients.index'));
        $this->assertDatabaseHas('clients', $clientData);
    }

    public function test_show_method()
    {
        $client = Client::factory()->create();

        $response = $this->get(route('clients.show', $client));

        $response->assertStatus(200);
        $response->assertViewIs('clients.show');
        $response->assertViewHas('client', $client);
    }

    public function test_edit_method()
    {
        $client = Client::factory()->create();
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('clients.edit', $client));

        $response->assertStatus(200);
        $response->assertViewIs('clients.edit');
        $response->assertViewHas('client', $client);
        $response->assertViewHas('users', $users);
    }

    public function test_update_method()
    {
        $client = Client::factory()->create();
        $updatedData = [
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->patch(route('clients.update', $client), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect(route('clients.index'));
        $this->assertDatabaseHas('clients', $updatedData);
    }

    public function test_destroy_method()
    {
        $client = Client::factory()->create();

        $response = $this->delete(route('clients.destroy', $client));

        $response->assertStatus(302);
        $response->assertRedirect(route('clients.index'));
        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
