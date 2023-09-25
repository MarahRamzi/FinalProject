<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Employee::class);

        // $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::orderBy('created_at')->get();

        return view('Employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return redirect(route('employees.index'))->with('success' , 'Employee created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('Employee.edit' , compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success' , 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success' , 'Employee deleted successfully');
    }
}
