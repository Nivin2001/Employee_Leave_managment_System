<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $leave_types =LeaveType::orderBy('id' , 'DESC')->get();
        return view('LEMS.admin.leaveTypes.index' , compact('leave_types'));
    }


    public function create()
    {

        return view('LEMS.admin.leaveTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        LeaveType::create($request->all());

        return redirect()->route('leave-types.index')
        ->with('msg', 'Leave Type Created Successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $leave_types = LeaveType::findOrFail($id);
        return view('LEMS.admin.leaveTypes.edit', compact('leave_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $leave_types = LeaveType::findOrFail($id);
        $leave_types->update($request->all());
        return redirect()->route('leave-types.index')
        ->with('msg', 'Leave Type Updated Successfully')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leave_types = LeaveType::findOrFail($id);
        $leave_types->delete();
        return redirect()->route('leave-types.index')
        ->with('msg', 'Leave Type deleted Successfully')
        ->with('type', 'danger');
    }
}
