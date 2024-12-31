<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        return view('LEMS.admin.departments.index', compact('departments')); // Pass the departments to the view.
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('LEMS.admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      $validated= $request->validate([
            'name' =>'required|string|max:255',
            'description' =>'nullable|string',
            'contact_email' =>'nullable|email|max:255',
            'contact_phone' =>'nullable|string|max:15',
        ]);
         // Create a new department with the validated data
       Department::create($validated);
        return redirect()->route('departments.index')
        ->with('success', 'Department added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $department = Department::findOrFail($id);
        return view('LEMS.admin.departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $department = Department::findOrFail($id);
        return view('LEMS.admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated= $request->validate([
            'name' =>'required|string|max:255',
            'description' =>'nullable|string',
            'contact_email' =>'nullable|email|max:255',
            'contact_phone' =>'nullable|string|max:15',
        ]);
        $department=Department::findOrFail($id);
        $department->update($validated);
        return redirect()->route('departments.index')
        ->with('success', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // Find the department by ID
    $department = Department::findOrFail($id);

    // Delete the department
    $department->delete();

    // Redirect back with a success message
    return redirect()->route('departments.index')
    ->with('success', 'Department deleted successfully!');
}
    }

