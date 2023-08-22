<?php

namespace App\Http\Controllers;

use App\Http\Requests\Leave_requestRequest;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Employee $employee)
    {
        $leaveRequests = $employee->leaveRequests()
        ->with('LeaveType')->get();
        return view('LeaveRequest.index' , compact('leaveRequests' , 'employee'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Employee $employee)
    {
        $LeaveTypes = LeaveType::all();

        return view('LeaveRequest.create' , compact('employee' , 'LeaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Leave_requestRequest $request , Employee $employee)
    {
        $request->merge([
            'employee_id' => $employee->id,
        ]);
        $leaveRequest = LeaveRequest::create($request->all());
        return redirect()->route('employees.leaveRequests.index' , $employee->id)->with('success' , "$employee->name Request Created Successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function showAllRequest(Request $request )
    {
        $leaveRequests = LeaveRequest::all();
        return view('LeaveRequest.Show' , compact('leaveRequests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Employee $employee , LeaveRequest $leaveRequest )
    {
        $LeaveTypes = LeaveType::all();

        return view('LeaveRequest.edit' , compact('employee' , 'LeaveTypes' , 'leaveRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Leave_requestRequest $request,Employee $employee, LeaveRequest $leaveRequest )
    {
        $request->merge([
            'employee_id' => $employee->id,
        ]);
        $leaveRequest->update($request->all());
        return redirect()->route('employees.leaveRequests.index' , $employee->id)->with('success' , "$employee->name Request Updated Successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Employee $employee ,LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();
        return redirect()->route('employees.leaveRequests.index' , $employee->id)->with('success' , "$employee->name Request Deleted Sccessfuly" );
    }

    public function denyLeaveRequest(Request $request,LeaveRequest $leaveRequest)
    {
        $leaveRequest->status = 'Denied';
        $leaveRequest->reason = $request->reason;
        $leaveRequest->save();
        return redirect()->back();
    }

    public function acceptLeaveRequest(LeaveRequest $leaveRequest)
    {
        $leaveRequest->status = 'Accept';
        $leaveRequest->save();
        return redirect()->back();
    }
}
