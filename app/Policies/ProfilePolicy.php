<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use App\Models\Profile;
use App\User;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Executed before any other methods on the policy.
     *
     * @param User $user User
     * 
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any profiles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile): bool
    {
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user): Response
    {
        if ($user->profile === null) {
            return Response::allow();
        }

        return Response::deny('Masz już swój profil');
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param User    $user    User
     * @param Profile $profile Profile
     * 
     * @return mixed
     */
    public function update(User $user, Profile $profile): bool
    {
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param User    $user    User
     * @param Profile $profile Prfile
     * 
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }
}
