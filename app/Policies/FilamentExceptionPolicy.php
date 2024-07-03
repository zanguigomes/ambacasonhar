<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FilamentException;
use Illuminate\Auth\Access\Response;

class FilamentExceptionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('ExceptionRead');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FilamentException $filamentException): bool
    {
        return $user->hasPermissionTo('ExceptionRead');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('ExceptionCreate');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FilamentException $filamentException): bool
    {
        return $user->hasPermissionTo('ExceptionUpdate');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FilamentException $filamentException): bool
    {
        return $user->hasPermissionTo('ExceptionDelete');
    }
}
