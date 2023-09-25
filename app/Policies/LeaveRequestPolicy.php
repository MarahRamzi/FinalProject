<?php

namespace App\Policies;

use App\Models\LeaveRequest;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LeaveRequestPolicy
{

    // public function before($user)
    // {
    //     return true;
    // }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($model)
    {
        // dd(Auth::guard('employee')->check());

        return Auth::guard('employee')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT EMPLOYEE');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($model)
    {
        // dd('test');

        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($model)
    {
        return Auth::guard('employee')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT EMPLOYEE');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($model)
    {
        return Auth::guard('employee')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT EMPLOYEE');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete( $user, LeaveRequest $leaveRequest)
    {
        return Auth::guard('employee')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT EMPLOYEE');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore( $user, LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, LeaveRequest $leaveRequest)
    {
        //
    }
}
