<?php

namespace App\Policies;

use App\Models\ClinicHaveStaff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClinicHaveStaffPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClinicHaveStaff  $clinicHaveStaff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ClinicHaveStaff $clinicHaveStaff)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClinicHaveStaff  $clinicHaveStaff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ClinicHaveStaff $clinicHaveStaff)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClinicHaveStaff  $clinicHaveStaff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ClinicHaveStaff $clinicHaveStaff)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClinicHaveStaff  $clinicHaveStaff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ClinicHaveStaff $clinicHaveStaff)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClinicHaveStaff  $clinicHaveStaff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ClinicHaveStaff $clinicHaveStaff)
    {
        //
    }
}
