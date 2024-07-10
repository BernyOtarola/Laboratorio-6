<?php

namespace App\Policies;

use App\Models\TaskModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function view(User $user, TaskModel $task)
    {
        return $user->id === $task->user_id;
    }

    public function update(User $user, TaskModel $task)
    {
        return $user->id === $task->user_id;
    }

    public function delete(User $user, TaskModel $task)
    {
        return $user->id === $task->user_id;
    }
}
