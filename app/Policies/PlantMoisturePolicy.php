<?php

namespace App\Policies;

use App\Models\PlantMoisture;
use App\Models\UserCato;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlantMoisturePolicy
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
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserCato $userCato, PlantMoisture $plantMoisture)
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
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserCato $userCato, PlantMoisture $plantMoisture)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserCato $userCato, PlantMoisture $plantMoisture)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserCato $userCato, PlantMoisture $plantMoisture)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserCato $userCato, PlantMoisture $plantMoisture)
    {
        //
    }
}
