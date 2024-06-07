<?php

namespace App\Policies;

use App\Models\PeminjamanModel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PeminjamanModelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PeminjamanModel $peminjamanModel): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PeminjamanModel $peminjamanModel): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PeminjamanModel $peminjamanModel): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PeminjamanModel $peminjamanModel): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PeminjamanModel $peminjamanModel): bool
    {
        //
    }
}
