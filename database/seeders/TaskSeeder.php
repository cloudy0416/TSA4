<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Sample User',
                'email' => 'sample@example.com',
            ]);
        }

        Task::create([
            'user_id' => $user->id,
            'title' => 'Complete TSA4 Project',
            'description' => 'Finish the Laravel task management system.',
            'due_date' => now()->addDays(3)->toDateString(),
            'status' => 'pending',
        ]);

        Task::create([
            'user_id' => $user->id,
            'title' => 'Review Laravel Lessons',
            'description' => 'Study Laravel controllers, models and migrations.',
            'due_date' => now()->addDays(5)->toDateString(),
            'status' => 'in_progress',
        ]);

        Task::create([
            'user_id' => $user->id,
            'title' => 'Prepare Project Documentation',
            'description' => 'Prepare the project documentation and README.',
            'due_date' => now()->addDays(7)->toDateString(),
            'status' => 'done',
        ]);
    }
}
