<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Idea;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    public function update(User $user, Idea $idea): Response
    {
        return $user->id === $idea->user_id
            ? Response::allow()
            : Response::deny('You do not have permission to update this idea.');
    }
}