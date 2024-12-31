<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show()
    {
        $user=auth()->user();
        return view('LEMS.employee.profile.show');
    }

       public function edit()
       {
        $departments=Department::all();

           return view('LEMS.employee.profile.edit',compact('departments')); // استخدم اسم الView المناسب
       }
       public function update(Request $request, $id)
       {

           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users,email,' . $id,
               'Contact_Number' => 'required|string|max:15', // تحقق من رقم الاتصال
               'department_id' => 'required|exists:departments,id', // تحقق من وجود القسم في الجدول
           ]);

           $user = User::findOrFail($id);
           $user->name = $request->input('name');
           $user->email = $request->input('email');
           $user->contact = $request->input('Contact_Number');
           $user->department_id = $request->input('department_id');
           $user->save();
           return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
       }


}
