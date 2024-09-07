<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /** @test */
    public function can_create_a_task()
    {
        $response = $this->post('/tasks', [
            'title' => 'New Task',
            'description' => 'Task description',
            'due_date' => '2024-12-31',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'New Task']);
    }

    /** @test */
    public function can_list_tasks()
    {
        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }

    /** @test */
    public function can_update_a_task()
    {
        $task = \App\Models\Task::factory()->create();

        $response = $this->put('/tasks/' . $task->id, [
            'title' => 'Updated Task',
            'description' => 'Updated description',
            'due_date' => '2024-12-31',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Task']);
    }

    /** @test */
    public function can_delete_a_task()
    {
        $task = \App\Models\Task::factory()->create();

        $response = $this->delete('/tasks/' . $task->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
