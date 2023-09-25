<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{

    public function __construct(){
        $this->authorizeResource(LeaveType::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = LeaveType::all();
        return view('LeaveType.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('LeaveType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $type = LeaveType::create($request->all());
        return redirect(route('leaveTypes.index'))->with('success' , "$request->name created Successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveType $leaveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveType $leaveType)
    {
        return view('LeaveType.edit' , compact('leaveType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $leaveType->update($request->all());

        return redirect()->route('leaveTypes.index')->with('success' , "$request->name Updated Successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveType $leaveType)
    {
        $typeName = $leaveType->name;
        $leaveType->delete();
        return redirect()->route('leaveTypes.index')->with('success' , " $typeName deleted Successfuly");

    }
}
