<?php
namespace App\Observers;

use App\User;
use Spatie\Permission\Models\Role;

class DefaultRoleOnUserCreation
{
    public function created(User $user)
    {
        $userRole = Role::where(['name' => 'user'])->first();
        $user->roles()->attach($userRole);
    }
}
