<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $user->role->permissions->contains('name', 'create_post');
    }


}
