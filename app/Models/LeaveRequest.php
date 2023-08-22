<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $fillable= ['employee_id' , 'leave_type_id' , 'start_date' , 'duration_days'];

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class , 'employee_id' , 'id');
    }

    public function LeaveType() : BelongsTo
    {
        return $this->belongsTo(LeaveType::class , 'leave_type_id' , 'id');
    }


}