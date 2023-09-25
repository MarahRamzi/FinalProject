<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' ,  'role'] ;

    public function leaveRequests() : HasMany
    {
        return $this->hasMany(LeaveRequest::class , 'employee_id' , 'id');
    }
}
