<?php

namespace Tests\Unit;

use App\Http\Controllers\EmployerController;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class EmployerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method()
    {
        $employers = Employer::factory()->count(3)->create();

        $response = $this->get(route('employers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('employers.index');
        $response->assertViewHas('employers', $employers);
    }

    public function test_create_method()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('employers.create'));

        $response->assertStatus(200);
        $response->assertViewIs('employers.create');
        $response->assertViewHas('users', $users);
    }

    public function test_store_method()
    {
        $employerData = [
            'registerDate' => '2023-04-01',
            'sin' => '123456789',
            'salaire' => 5000,
            'contractType' => 'Full-time',
            'poste' => 'Developer',
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->post(route('employers.store'), $employerData);

        $response->assertStatus(302);
        $response->assertRedirect(route('employers.index'));
        $this->assertDatabaseHas('employers', $employerData);
    }

    public function test_show_method()
    {
        $employer = Employer::factory()->create();

        $response = $this->get(route('employers.show', $employer));

        $response->assertStatus(200);
        $response->assertViewIs('employers.show');
        $response->assertViewHas('employer', $employer);
    }

    public function test_edit_method()
    {
        $employer = Employer::factory()->create();
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('employers.edit', $employer));

        $response->assertStatus(200);
        $response->assertViewIs('employers.edit');
        $response->assertViewHas('employer', $employer);
        $response->assertViewHas('users', $users);
    }

    public function test_update_method()
    {
        $employer = Employer::factory()->create();
        $updatedData = [
            'registerDate' => '2023-04-02',
            'sin' => '987654321',
            'salaire' => 6000,
            'contractType' => 'Part-time',
            'poste' => 'Senior Developer',
            'user_id' => User::factory()->create()->id,
        ];

        $response = $this->patch(route('employers.update', $employer), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect(route('employers.index'));
        $this->assertDatabaseHas('employers', $updatedData);
    }

    public function test_destroy_method()
    {
        $employer = Employer::factory()->create();

        $response = $this->delete(route('employers.destroy', $employer));

        $response->assertStatus(302);
        $response->assertRedirect(route('employers.index'));
        $this->assertDatabaseMissing('employers', ['id' => $employer->id]);
    }
}
