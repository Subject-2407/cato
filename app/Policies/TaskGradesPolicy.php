<?php

namespace App\Policies;

use App\Models\TaskGrades;
use App\Models\UserCato;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskGradesPolicy
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
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserCato $userCato, TaskGrades $taskGrades)
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
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserCato $userCato, TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserCato $userCato, TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserCato $userCato, TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserCato  $userCato
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserCato $userCato, TaskGrades $taskGrades)
    {
        //
    }
}
