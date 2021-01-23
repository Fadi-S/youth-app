<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_user_can_complete_a_task()
    {
        $user = User::factory()->create();

        $this->assertCount(0, $user->tasks);

        $task = Task::factory()->create();

        $user->complete($task);

        $this->assertCount(1, $user->tasks);
    }

    /** @test */
    function a_user_can_complete_a_list_of_tasks()
    {
        $user = User::factory()->create();
        $tasks = Task::factory()->count(5)->create();

        $this->assertCount(0, $user->tasks);

        $user->complete($tasks);

        $this->assertCount(5, $user->tasks);
    }
}