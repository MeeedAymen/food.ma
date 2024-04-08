<?php

namespace Tests\Unit;

use App\Http\Controllers\RateController;
use App\Models\Client;
use App\Models\Rate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class RateControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method()
    {
        $rates = Rate::factory()->count(3)->create();

        $response = $this->get(route('rates.index'));

        $response->assertStatus(200);
        $response->assertViewIs('rates.index');
        $response->assertViewHas('rates', $rates);
    }

    public function test_create_method()
    {
        $clients = Client::factory()->count(3)->create();

        $response = $this->get(route('rates.create'));

        $response->assertStatus(200);
        $response->assertViewIs('rates.create');
        $response->assertViewHas('clients', $clients);
    }

    public function test_store_method()
    {
        $clientData = [
            'user_id' => Client::factory()->create()->id,
            'rate' => 4.5,
            'comment' => 'Great service!',
        ];

        $response = $this->post(route('rates.store'), $clientData);

        $response->assertStatus(302);
        $response->assertRedirect(route('rates.index'));
        $this->assertDatabaseHas('rates', $clientData);
    }

    public function test_show_method()
    {
        $rate = Rate::factory()->create();

        $response = $this->get(route('rates.show', $rate));

        $response->assertStatus(200);
        $response->assertViewIs('rates.show');
        $response->assertViewHas('rate', $rate);
    }

    public function test_edit_method()
    {
        $rate = Rate::factory()->create();
        $clients = Client::factory()->count(3)->create();

        $response = $this->get(route('rates.edit', $rate));

        $response->assertStatus(200);
        $response->assertViewIs('rates.edit');
        $response->assertViewHas('rate', $rate);
        $response->assertViewHas('clients', $clients);
    }

    public function test_update_method()
    {
        $rate = Rate::factory()->create();
        $updatedData = [
            'rate' => 5,
            'comment' => 'Updated comment',
            'client_id' => Client::factory()->create()->id,
        ];

        $response = $this->patch(route('rates.update', $rate), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect(route('rates.index'));
        $this->assertDatabaseHas('rates', $updatedData);
    }

    public function test_destroy_method()
    {
        $rate = Rate::factory()->create();

        $response = $this->delete(route('rates.destroy', $rate));

        $response->assertStatus(302);
        $response->assertRedirect(route('rates.index'));
        $this->assertDatabaseMissing('rates', ['id' => $rate->id]);
    }
}
