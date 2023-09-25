<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user)
    {

        // dd(Auth::user());
        // dd(Auth::guard('web')->check());
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view( $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user)
    {
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Employee $employee)
    {
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Employee $employee)
    {
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee)
    {
        //
    }
}
