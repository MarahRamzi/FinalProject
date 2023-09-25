<?php

namespace App\Policies;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LeaveTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user)
    {
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user)
    {
        // dd('test');

        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, LeaveType $leaveType)
    {
        dd('test');
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, LeaveType $leaveType)
    {
        return Auth::guard('web')->check()
        ?Response::allow()
        :Response::deny('YOU ARE NOT ADMIN');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete( $user, LeaveType $leaveType){
        //
    }
}
