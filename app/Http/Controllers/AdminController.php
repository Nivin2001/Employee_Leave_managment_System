<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\LeaveRequest;
use App\Models\User;
use App\Models\LeaveType;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admins()
    {
        $admins = User::where('type', 'admin')->get();
        return view('LEMS.admin.admin', compact('admins'));
    }
    public function dashboard()
    {
    $latestLeaveRequests = LeaveRequest::latest()->paginate(5);
        $totalEmployees = User::where('type','employee')->count();
        $totalLeaveTypes = LeaveType::count();
        $totaldepartments = Department::count();
        $totalLeaveRequestsAppend = LeaveRequest::pending()->count();
        $totalLeaveRequestsAccepted = LeaveRequest::approved()->count();
        $totalLeaveRequestsRejected = LeaveRequest::rejected()->count();
        return view('LEMS.admin.index', compact(
            'latestLeaveRequests',
            'totalEmployees',
            'totalLeaveTypes',
            'totaldepartments',
            'totalLeaveRequestsAppend',
            'totalLeaveRequestsAccepted',
            'totalLeaveRequestsRejected',

        ));
    }
    public function messages()
    {

        $messages = Message::where('status', 'unread')->get();


        return view('LEMS.admin.master', compact('messages'));
    }




}
