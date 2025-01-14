<?php

namespace App\Policies;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->user_type == 'A';
    }

    public function changePassword(User $user)
    {
        return Auth::user()->id == $user->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return (($user->user_type == 'C'|| $user->user_type == 'A') && $model->id == $user->id) || ($model->user_type == 'E' && $user->user_type == 'A');
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return Auth::user()->id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->user_type == 'A';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }

    public function block(User $user, User $model): bool
    {
        return $user->user_type == 'A';
    }
}
