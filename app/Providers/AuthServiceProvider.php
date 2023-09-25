<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Employee' =>'App\Policies\EmployeePolicy',
        // 'App\Models\LeaveType' => 'App\Policies\LeaveTypePolicy',
        // 'App\Models\LeaveRequest' => 'App\Policies\LeaveRequestPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('leaveRequest' , function($user){
        //     // dd(Auth::guard('employee')->check());
        //     // return Auth::guard('employee')->check();
        //     dd($user);
        //     return Auth::guard('employee')->check()
        //     ?Response::allow()
        //     :Response::deny('YOU ARE NOT EMPLOYEE');
        // });
    }
}
