<?php

namespace App\Policies;

use App\Models\InstanceClass;
use App\Models\UserCato;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstanceClassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(UserCato $userCato)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserCato $userCato, InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(UserCato $userCato)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserCato $userCato, InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserCato $userCato, InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserCato $userCato, InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserCato $userCato, InstanceClass $instanceClass)
    {
        //
    }
}
