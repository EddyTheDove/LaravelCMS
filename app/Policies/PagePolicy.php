<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $user->role->permissions->contains('name', 'create_page');
    }


}
