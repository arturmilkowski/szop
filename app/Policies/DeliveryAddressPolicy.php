<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use App\User;
use App\Models\DeliveryAddress;

class DeliveryAddressPolicy
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
     * Determine whether the user can view any delivery addresses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the delivery address.
     *
     * @param User            $user            User
     * @param DeliveryAddress $deliveryAddress DeliveryAddress
     * 
     * @return mixed
     */
    public function view(User $user, DeliveryAddress $deliveryAddress): bool
    {
        return $user->profile->id === $deliveryAddress->profile_id;
    }

    /**
     * Determine whether the user can create delivery addresses.
     *
     * @param User $user User
     * 
     * @return Response
     */
    public function create(User $user): Response
    {
        if ($user->profile->deliveryAddress === null) {
            return Response::allow();
        }

        return Response::deny('Masz już swój adres dostawy');
    }

    /**
     * Determine whether the user can update the delivery address.
     *
     * @param User            $user            User
     * @param DeliveryAddress $deliveryAddress DeliveryAddress
     * 
     * @return mixed
     */
    public function update(User $user, DeliveryAddress $deliveryAddress): bool
    {
        return $user->profile->id === $deliveryAddress->profile_id;
    }

    /**
     * Determine whether the user can delete the delivery address.
     *
     * @param User            $user            User
     * @param DeliveryAddress $deliveryAddress DeliveryAddress
     * 
     * @return mixed
     */
    public function delete(User $user, DeliveryAddress $deliveryAddress): bool
    {
        return $user->profile->id === $deliveryAddress->profile_id;
    }

    /**
     * Determine whether the user can restore the delivery address.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return mixed
     */
    public function restore(User $user, DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the delivery address.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return mixed
     */
    public function forceDelete(User $user, DeliveryAddress $deliveryAddress)
    {
        //
    }
}
